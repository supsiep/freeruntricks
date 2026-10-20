<x-layout>
    <section class="trick-show">
        <div class="show-container">

            <div class="show-info-container">
                <h2>{{ $trick->name }}</h2>
                <p>{{ $trick->description }}</p>
            </div>



            {{--            comments van de trick--}}
            <div class="show-buttons-container">
                <form action="{{ route('tricks.destroy', $trick->id) }}" method="POST">
                    @method('DELETE')
                    <button class="show-button" type="submit">Delete Trick</button>
                </form>
                <a class="show-button" href="{{ route('tricks.edit', $trick->id) }}">Edit Trick</a>
            </div>

{{--            comments van de trick--}}
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
