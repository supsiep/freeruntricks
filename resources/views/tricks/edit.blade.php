<x-layout>
    <h1>Edit Trick</h1>
    <form action="{{ route('tricks.update', $trick->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $trick->name }}">
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ $trick->description }}</textarea>
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="text" name="image" id="image" value="{{ $trick->image }}">
        </div>
        <button type="submit">Update Trick</button>
    </form>
</x-layout>
