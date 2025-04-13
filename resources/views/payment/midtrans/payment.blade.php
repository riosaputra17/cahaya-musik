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
                    window.location.href = '/payment/success';
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
