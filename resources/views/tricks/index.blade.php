<x-layout>

    <section class="main-content">
        <h1>FreeRun Tricks</h1>

        <div class="tricks-container">

    @for($i = 0; $i < count($tricks); $i++)

        <a href="{{ route('tricks.show', $tricks[$i]->id) }}">
            <div class="trick-card">

                <img class="card-image" src="{{ $tricks[$i]->image }}.jpg" alt="{{ $tricks[$i]->name }}">
                <div class="trick-info-container">
                    <h2 class="card-name">{{ $tricks[$i]->name }}</h2>
                    <p class="card-text">{{ $tricks[$i]->description }}</p>
                </div>
            </div>
        </a>

    @endfor

        </div>

    </section>

</x-layout>
