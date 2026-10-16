<x-layout>
    <h1>{{ $trick->name }}</h1>
    <p>{{ $trick->description }}</p>

    <h2>Comments</h2>
    @forelse($trick->comments as $comment)
        <p>{{ $comment->text }}</p>
        @empty
            <p>No comments yet.</p>
    @endforelse
    <form action="{{ route('tricks.destroy', $trick->id) }}" method="POST">
        @method('DELETE')
        <button type="submit">Delete Trick</button>
    </form>
</x-layout>
