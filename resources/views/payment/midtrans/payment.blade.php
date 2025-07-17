<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Midtrans</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #f8f9fa;
        }

        .payment-container {
            max-width: 400px;
            margin: 40px auto;
            padding: 24px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>

<body>
    <div class="payment-container">
        <h2 class="mb-4 text-center">Pembayaran</h2>
        @isset($snapToken)
            @if (isset($transaction) && $transaction['transaction_status'] === 'expire')
                <div class="alert alert-warning text-center">
                    Pembayaran telah kadaluarsa. Silakan lakukan pemesanan ulang atau hubungi admin.
                </div>
            @else
                <div class="text-center mb-3">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2">Menyiapkan pembayaran...</p>
                </div>
                <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
                </script>
                <script type="text/javascript">
                    document.addEventListener("DOMContentLoaded", function() {
                        window.snap.pay(@json($snapToken), {
                            onSuccess: function(result) {
                                window.location.href =
                                    "{{ route('payment.success', ['order' => $order->order_id]) }}";
                            },
                            onPending: function(result) {
                                // Redirect user to a custom pending page or show a message
                                window.location.href =
                                    "{{ route('payment.pending', ['order' => $order->order_id]) }}";
                            },
                            onError: function(result) {
                                if (result && result.transaction_status === 'expire') {
                                    alert("Pembayaran telah kadaluarsa. Silakan lakukan pemesanan ulang.");
                                    window.location.href =
                                        "{{ route('home') }}";
                                } else {
                                    // alert("Error: " + JSON.stringify(result));
                                    window.location.href =
                                        "{{ route('home') }}";
                                }
                                console.error("Midtrans Error:", result);
                            },
                            onClose: function() {
                                alert('Anda belum menyelesaikan pembayaran');
                                window.location.href =
                                    "{{ route('payment.pending', ['order' => $order->order_id]) }}";
                            }
                        });
                    });
                </script>
            @endif
        @else
            <div class="alert alert-danger text-center">Snap Token tidak tersedia atau gagal dibuat.</div>
        @endisset
    </div>
</body>

</html>
