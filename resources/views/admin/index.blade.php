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

        @foreach($tricks as $trick)
            <div style="display: flex; flex-direction: row; gap: 20px; width: 100%; background: #ff750f">
                <p>Trick: {{ $trick->name }}</p>
                <p>User: {{$trick->user->name}}</p>
                <p>User ID: {{$trick->user->id}}</p>
                <div style="flex-grow: 1;"></div>
                <a href="{{ route('tricks.show', $trick->id) }}">View Details</a>
                <a href="{{ route('tricks.edit', $trick->id) }}">Edit</a>
                <a href="{{ route('tricks.destroy', $trick->id) }}" onclick="return confirm('Are you sure you want to delete this trick?')">Delete</a>
                @if($trick->status == 1)
                    <p>Status: Active</p>
                @else
                    <p>Status: Inactive</p>
                @endif
            </div>
        @endforeach


        <div class="tricks-container">


{{--                    <a href="{{ route('tricks.show', $trick->id) }}">--}}
{{--                        <div class="trick-card">--}}

{{--                            <img class="card-image" src="{{ Storage::url($trick->image) }}" alt="{{ $trick->name }}">--}}
{{--                            <div class="trick-info-container">--}}
{{--                                <h2 class="card-name">{{ $trick->name }}</h2>--}}
{{--                                <p class="card-text">{{ $trick->description }}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}


        </div>

    </section>

</x-layout>
