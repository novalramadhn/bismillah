<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Halaman Home</h1>
    <h2>Selamat Datang, {{ Auth::user()->name }}. anda adalah {{ Auth::user()->roles->name }}</h2>

</body>
</html>
