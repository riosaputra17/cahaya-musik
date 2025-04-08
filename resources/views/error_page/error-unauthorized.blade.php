<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #a31621, #a31621 33%, #8f1a1a 66%, #a31621);
            color: #fff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            flex-direction: column;
        }

        h1 {
            font-size: 120px;
            margin: 0;
        }

        p {
            font-size: 18px;
            margin-bottom: 40px;
        }

        .buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .btn {
            padding: 12px 24px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-home {
            background-color: white;
            color: #a31621;
            border: none;
        }

        .btn-contact {
            border: 2px solid white;
            color: white;
            background: transparent;
        }

        .btn:hover {
            opacity: 0.85;
        }
    </style>
</head>

<body>
    <h1>404</h1>
    <p>Halaman tidak tersedia karena anda tidak memiliki akses, kembali kehalaman home</p>
    <div class="buttons">
        <a href="{{ url('/') }}" class="btn btn-home">Go Home</a>
        <!-- <a href="#" class="btn btn-contact">Contact Us</a> -->
    </div>
</body>

</html>
