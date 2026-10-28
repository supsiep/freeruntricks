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
            <div style="display: flex; flex-direction: row; gap: 20px; width: 100%; background: #F3F4F6; padding: 20px; border: black 2px solid;">
                <p>Trick: {{ $trick->name }}</p>
                <p>User: {{$trick->user->name}}</p>
                <p>User ID: {{$trick->user->id}}</p>
                <div style="flex-grow: 1;"></div>
                <a class="submit-button" href="{{ route('tricks.show', $trick->id) }}">View Details</a>
                <a class="submit-button" href="{{ route('tricks.edit', $trick->id) }}">Edit</a>
                <form action="{{ route('tricks.destroy', $trick->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="submit-button" type="submit" onclick="return confirm('Are you sure you want to delete this trick?')">Delete</button>
                </form>
                <form action="{{ route('tricks.status', $trick->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="submit-button">{{ $trick->status === 1 ? 'Deactivate' : 'Activate' }}</button>
                </form>
            </div>
        @endforeach

    </section>

</x-layout>
