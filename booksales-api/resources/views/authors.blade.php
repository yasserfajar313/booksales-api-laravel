<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Penulis</title>
</head>
<body>
    <h1>Daftar Author</h1>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Negara</th>
            <th>Biografi</th>
        </tr>
        @foreach($authors as $author)
        <tr>
            <td>{{ $author->id }}</td>
            <td>{{ $author->name }}</td>
            <td>{{ $author->country }}</td>
            <td>{{ $author->biography }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
