<x-layout>
    <section class="trick-edit">
    <h1>Edit Trick</h1>

    <div class="form-container">
    <form action="{{ route('tricks.update', $trick->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $trick->name }}">
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ $trick->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            <input type="text" name="image" id="image" value="{{ $trick->image }}">
        </div>
        <button class="submit-button" type="submit">Update Trick</button>
    </form>
    </div>
    </section>
</x-layout>
