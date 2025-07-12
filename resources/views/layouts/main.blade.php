<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $judul ?? 'Website' }}</title>
    @yield('extra-css')
</head>
<body>
    @yield('content')
</body>
</html>