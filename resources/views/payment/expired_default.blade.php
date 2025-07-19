<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Expired</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* ... gunakan style yang sama seperti sebelumnya ... */
        /* Anda bisa copy seluruh style dari kode Anda sebelumnya */
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="payment-container">
            <div class="text-center">
                <div class="status-icon" style="background: linear-gradient(135deg, #ff6b6b 0%, #ff9500 100%); box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);">
                    <i class="fas fa-times-circle"></i>
                </div>

                <h2>Pembayaran Expired</h2>

                <p class="mt-3">
                    Pesanan dengan ID <strong class="order-id">{{ $order->order_id }}</strong> telah kadaluarsa.
                </p>

                <a href="{{ route('home') }}" class="btn btn-primary mt-4">
                    <i class="fas fa-home me-2"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</body>

</html>
