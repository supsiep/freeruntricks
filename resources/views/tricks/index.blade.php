<x-layout>
    <section class="main-content">
        <h1>FreeRun Tricks</h1>

        <div class="view-container">
                <form class="search-form" action="" method="GET">
                    @csrf
                    <div class="search-container">
                        <label for="search">Search a for trick:</label>
                        <input type="search" id="search" name="search" value="{{ $search }}">
                        <button class="submit-button" type="submit">Search</button>
                    </div>

                    <div class="search-container">
                        <label for="filter" >Filter by status:</label>
                        <select name="filter" id="filter" onchange="this.form.submit()">

                            <option value="">All</option>
                            @foreach($labels as $label)
                                <option value="{{ $label->id }}" @selected($filter == $label->id)>{{ $label->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
        </div>

        <div class="tricks-container">
    @for($i = 0; $i < count($tricks); $i++)
        @if($tricks[$i]->status == 1)

        <a href="{{ route('tricks.show', $tricks[$i]->id) }}">
            <div class="trick-card">

                <img class="card-image" src="{{ Storage::url($tricks[$i]->image) }}" alt="{{ $tricks[$i]->name }}">
                <div class="trick-info-container">
                    <h2 class="card-name">{{ $tricks[$i]->name }}</h2>
                    <p class="card-text">{{ $tricks[$i]->description }}</p>
                </div>
            </div>
        </a>
                @endif

    @endfor

        </div>

    </section>

</x-layout>
