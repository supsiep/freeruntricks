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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <nav>
        <div class="nav-container">
            <x-navlink href="{{ route('tricks.index') }}">Tricks</x-navlink>
            <x-navlink href="{{ route('tricks.create') }}">Add</x-navlink>
            <x-navlink href="{{ route('contact') }}">Contact</x-navlink>
            <x-navlink href="{{ route('about') }}">About</x-navlink>
            @auth()
                @if(auth()->user()->role === 'admin')
                    <x-navlink href="{{ route('admin.index') }}">Admin</x-navlink>
                @endif
            @endauth
            <div class="flex-grow"></div>
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <x-navlink>
                        <button type="submit">Logout</button>
                    </x-navlink>
                </form>
                @php
                    $userName = auth()->user()->name;
                    $name = '';
                     $userName = str_split($userName);
                    for ($i = 0; $i < 5; $i++) {
                        $name .= $userName[$i];
                    }
                @endphp
                <a href="{{ route('myprofile.edit', auth()->user()->id) }}" class="nav"> {{ $name }}...</a>
            @endauth

            @guest
                <x-navlink href="{{ route('login') }}">Login</x-navlink>
                <x-navlink href="{{ route('register') }}">Register</x-navlink>
            @endguest
        </div>
    </nav>

        {{ $slot }}

</body>
</html>
