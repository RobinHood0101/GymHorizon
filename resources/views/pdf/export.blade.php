<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
    <h1>{{ Str::headline($type) }}</h1>
    @foreach ($items as $item)
        <p>{{ $item->name }}</p>
    @endforeach
</body>
</html>
