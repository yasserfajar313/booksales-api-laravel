<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
</head>
<body>
    <h1>Daftar Buku</h1>
<ul>
    @foreach ($books as $book)
        <li>{{ $book['title'] }} - {{ $book['author'] }}</li>
    @endforeach
</ul>

</body>
</html>