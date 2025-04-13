<!DOCTYPE html>
<html>
<head>
    <title>Midtrans Payment</title>
</head>
<body>
    <h1>Bayar Sekarang</h1>

    <form method="POST" action="/pay">
        @csrf
        <button type="submit">Get Snap Token</button>
    </form>

    @isset($snapToken)
        <script src="https://app.sandbox.midtrans.com/snap/snap.js"
                data-client-key="{{ config('midtrans.client_key') }}"></script>
        <script type="text/javascript">
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    fetch("{{ route('payment.success') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            order_id: "{{ $order->order_id }}"
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            alert("Pembayaran berhasil!");
                            window.location.href = "/my-orders/{{ $order->customer_id }}";
                        } else {
                            alert("Gagal memperbarui status pembayaran.");
                        }
                    })
                    .catch(err => {
                        console.error(err);
                        alert("Terjadi kesalahan saat memperbarui status pembayaran.");
                    });
                },
                onPending: function(result){
                    alert("Pending: " + JSON.stringify(result));
                },
                onError: function(result){
                    alert("Error: " + JSON.stringify(result));
                },
                onClose: function(){
                    alert('Anda belum menyelesaikan pembayaran');
                }
            });
        </script>
    @endisset
</body>
</html>
