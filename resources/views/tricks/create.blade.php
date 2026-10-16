<x-layout>
    <h1>Create a New Trick</h1>
    <form action="{{route('tricks.store')}}" method="POST">
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{old('name')}}">
            @error('name')
            <span>{{$message}}</span>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" value="{{old('description')}}">
            @error('description') <span>{{$message}}</span> @enderror
        </div>
        <div>
            <label for="image">Image</label>
            <input type="text" id="image" name="image" value="{{old('image')}}">
            @error('image') <span>{{$message}}</span> @enderror
        </div>
        <div>
            <input type="submit" value="Create Trick">
        </div>
    </form>
</x-layout>
