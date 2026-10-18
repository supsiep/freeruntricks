<x-layout>

    <section class="trick-create">

    <h1>Create a New Trick</h1>
        <div class="form-container">
            <form action="{{route('tricks.store')}}" method="POST">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{old('name')}}">
                    @error('name')
                    <span>{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" id="description" name="description" value="{{old('description')}}"></textarea>
                    @error('description') <span>{{$message}}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="text" id="image" name="image" value="{{old('image')}}">
                    @error('image') <span>{{$message}}</span> @enderror
                </div>
                <div>
                    <button class="submit-button" type="submit">Create Trick</button>
                </div>
            </form>
        </div>

    </section>

</x-layout>
