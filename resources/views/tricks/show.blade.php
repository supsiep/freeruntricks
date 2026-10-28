<x-layout>
    <section class="trick-show">
        <div class="show-container">

            <div class="show-info-container">
                <h2>{{ $trick->name }}</h2>
                <p>{{ $trick->description }}</p>
            </div>

{{--            aanpassen als ingelogd als eigenaar--}}
            @if(Auth::check() && Auth::user()->id === $trick->user_id || Auth::user()->role === 'admin')
                @if(Auth::user()->id === $trick->user_id)
                    <p>You are the owner of this trick and can edit it.</p>
                @else
                    <p>You are an admin and can edit this trick.</p>
                @endif
                <div class="show-buttons-container">
                    <form action="{{ route('tricks.destroy', $trick->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="show-button" type="submit">Delete Trick</button>
                    </form>
                    <a class="show-button" href="{{ route('tricks.edit', $trick->id) }}">Edit Trick</a>
                    <form action="{{ route('tricks.status', $trick->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="show-button" type="submit">{{ $trick->status === 1 ? 'Deactivate' : 'Activate' }}</button>
                    </form>
                </div>
            @endif

            <!-- comments van de trick -->
            <div class="show-comments-container">
                <h2>Comments</h2>
                @forelse($trick->comments as $comment)
                    <p>{{ $comment->text }}</p>
                @empty
                    <p>No comments yet.</p>
               @endforelse
            </div>

        </div>

        <div class="show-image-container">
            <img src="{{ Storage::url($trick->image) }}" alt="{{ $trick->name }}">
        </div>

    </section>
</x-layout>
