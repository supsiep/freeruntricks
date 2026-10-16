<x-layout>
    <a href="{{ route('tricks.create') }}">Create New Trick</a>

    @for($i = 0; $i < count($tricks); $i++)
        <a href="{{ route('tricks.show', $tricks[$i]->id) }}">{{ $tricks[$i]->name }}</a>
        <p>{{ $tricks[$i]->description }}</p>
        <p>{{ $tricks[$i]->image }}</p>

    @endfor
</x-layout>
