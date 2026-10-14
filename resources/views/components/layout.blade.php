@props([
    'title' => "welcome"
])

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style>
        .card {
            background: gray;
            text-align: center;
            padding: 1rem;
        }

        .max-w-400 {
            max-width: 400px;
            margin: auto;
        }
    </style>

{{--    @vite(['resources/css/app.css', 'resources/js/app.js'])--}}

</head>

<body>
    <nav>
        <x-navlink href="{{ route('home') }}">Home</x-navlink>
        <x-navlink href="{{ route('contact') }}">Contact</x-navlink>
        <x-navlink href="{{ route('about') }}">About</x-navlink>
        <x-navlink href="{{ route('tricks.index') }}">Tricks</x-navlink>
    </nav>

    {{ $slot }}

</body>
</html>
