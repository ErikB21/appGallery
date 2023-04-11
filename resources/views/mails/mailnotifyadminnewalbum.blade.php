<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email for New Album</title>
</head>
<body>
    <div class="card text-center">
        <div class="card-header">
            <h1 class="text-center">Hello {{ $admin->name }}</h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">Nuovo Album</h5>
            <p class="card-text">L'Album {{ $album->album_name }} è stato creato con successo!</p>
            <a class="btn btn-dark" href="{{ route('albums.edit', $album->id) }}">{{ $album->album_name }}</a>
        </div>
        <div class="card-footer text-muted">
            Thanks, <br> {{ config('app.name') }}
        </div>
    </div>
</body>
</html>
