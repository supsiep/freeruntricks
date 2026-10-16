@props([
    'active' => false,
    'href' => '/'
])

@php
    $path = parse_url($href, PHP_URL_PATH);
    $path = trim($path, '/');
    $active = request()->is($path);
@endphp

    <a class="nav {{ $active ? 'active-url' : '' }}" href="{{ $href }}">
        {{ $slot }}
    </a>
