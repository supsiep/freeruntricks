<x-layout>
{{--    <a href="{{ route('tricks.create') }}">Create New Trick</a>--}}

    @for($i = 0; $i < count($tricks); $i++)
{{--        <a href="{{ route('tricks.show', $tricks[$i]->id) }}">{{ $tricks[$i]->name }}</a>--}}
{{--        <p>{{ $tricks[$i]->description }}</p>--}}
{{--        <p>{{ $tricks[$i]->image }}</p>--}}

        <div class="trick-card">
            <a href="{{ route('tricks.show', $tricks[$i]->id) }}">
                <img class="card-image" src="{{ $tricks[$i]->image }}" alt="{{ $tricks[$i]->name }}">
                <div class="trick-info-container">
                    <h2 class="card-name">{{ $tricks[$i]->name }}</h2>
                    <p class="card-text">{{ $tricks[$i]->description }}</p>
                </div>
            </a>

        </div>

    @endfor
</x-layout>
