@isset($snapToken)
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            window.snap.pay(@json($snapToken), {
                onSuccess: function(result) {
                    // pastikan $order adalah model, bukan ID string
                    window.location.href = "{{ route('payment.success', ['order' => $order->order_id]) }}";
                },
                onPending: function(result) {
                    alert("Pending: " + JSON.stringify(result));
                },
                onError: function(result) {
                    alert("Error: " + JSON.stringify(result));
                    console.error("Midtrans Error:", result);
                },
                onClose: function() {
                    alert('Anda belum menyelesaikan pembayaran');
                }
            });
        });
    </script>
@else
    <div class="alert alert-danger">Snap Token tidak tersedia atau gagal dibuat.</div>
@endisset