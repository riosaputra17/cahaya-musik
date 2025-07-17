<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Midtrans</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #e0e6ed;
            position: relative;
            overflow-x: hidden;
        }

        /* Background Animation */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.1) 0%, transparent 50%);
            z-index: -1;
            animation: backgroundShift 20s ease-in-out infinite alternate;
        }

        @keyframes backgroundShift {
            0% {
                transform: translateX(-10px) translateY(-10px);
            }

            100% {
                transform: translateX(10px) translateY(10px);
            }
        }

        .container {
            position: relative;
            z-index: 1;
        }

        .payment-container {
            max-width: 450px;
            margin: 60px auto;
            padding: 40px 35px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow:
                0 8px 32px rgba(0, 0, 0, 0.3),
                0 2px 8px rgba(255, 255, 255, 0.1) inset;
            position: relative;
            overflow: hidden;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .payment-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4, #feca57);
            background-size: 300% 100%;
            animation: gradientShift 3s ease-in-out infinite;
        }

        @keyframes gradientShift {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .status-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 25px;
            background: linear-gradient(135deg, #ffd93d 0%, #ff9500 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
            color: #fff;
            box-shadow: 0 8px 25px rgba(255, 217, 61, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        h2 {
            color: #ffffff;
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        p {
            color: #b8c5d1;
            line-height: 1.6;
            margin-bottom: 15px;
            font-size: 1rem;
        }

        .order-id {
            color: #4ecdc4;
            font-weight: 600;
            background: rgba(78, 205, 196, 0.1);
            padding: 2px 8px;
            border-radius: 6px;
            border: 1px solid rgba(78, 205, 196, 0.2);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
            background: linear-gradient(135deg, #7c8ef0 0%, #8a5fb8 100%);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* Payment methods info */
        .payment-methods {
            margin-top: 25px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .payment-methods h6 {
            color: #ffffff;
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .payment-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .payment-icon {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #b8c5d1;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        .payment-icon:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .payment-container {
                margin: 30px 20px;
                padding: 30px 25px;
            }

            h2 {
                font-size: 1.5rem;
            }

            .status-icon {
                width: 70px;
                height: 70px;
                font-size: 30px;
            }
        }

        @media (max-width: 480px) {
            .payment-container {
                margin: 20px 15px;
                padding: 25px 20px;
            }

            .btn-primary {
                width: 100%;
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div class="payment-container">
            <div class="text-center">
                <div class="status-icon">
                    <i class="fas fa-clock"></i>
                </div>

                <h2>Status Pembayaran Pending</h2>

                <p class="mt-3">
                    Pembayaran untuk pesanan <strong class="order-id">{{ $order->order_id }}</strong> sedang menunggu
                    penyelesaian.
                </p>

                <p>
                    Silakan selesaikan pembayaran melalui metode yang telah Anda pilih sebelumnya.
                </p>

                <div class="payment-methods">
                    <h6>Metode Pembayaran Tersedia:</h6>
                    <div class="payment-icons">
                        <div class="payment-icon" title="Transfer Bank">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="payment-icon" title="QRIS">
                            <i class="fas fa-qrcode"></i>
                        </div>
                        <div class="payment-icon" title="E-Wallet">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="payment-icon" title="Credit Card">
                            <i class="fas fa-credit-card"></i>
                        </div>
                    </div>
                </div>

                <a href="{{ route('orders.my', $order->customer_id) }}" class="btn btn-primary mt-4">
                    <i class="fas fa-list-alt me-2"></i>
                    Lihat Pesanan Saya
                </a>
            </div>
        </div>
    </div>
</body>

</html>
