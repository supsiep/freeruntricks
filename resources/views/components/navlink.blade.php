@props([
    'active' => false,
    'href' => '/'
])

@php
    $path = parse_url($href, PHP_URL_PATH);
    $active = request()->is(trim($path, '/'));
@endphp

<a href="{{ $href }}" {{ $active ? 'class="color red"' : '' }}>{{ $slot }}</a>

@if ($active)
    <span style="color: red;">(current page)</span>
@endif
