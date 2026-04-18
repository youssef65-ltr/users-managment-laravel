<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ $title ?? 'Document'}}</title>
</head>
<body>
    @if (session()->has("success"))
        <h1 style="background-color : darkgreen">
            {{ session()->get("success") }}
        </h1>
    @endif
    <h1>application for users management</h1>
    <header>
        <a href="/users/create">create</a>
        <a href="/delete">delete</a>
        <a href="/users">index</a>
    </header>

    <section>
        {{ $slot }}
    </section>
</body>
</html>