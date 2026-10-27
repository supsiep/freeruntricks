<x-layout>

    <section class="trick-create">

    <h1>Create a New Trick</h1>
        <div class="form-container">
            <form action="{{route('tricks.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
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
                    <input type="file" id="image" name="image" accept="image/png, image/webp, image/jpeg, image/jpg, image/gif" value="{{old('image')}}">
                    @error('image') <span>{{$message}}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="label">Label</label>
                    <select name="label" id="label">
                        @foreach($labels as $label)
                            <option value="{{$label->id}}">{{$label->name}}</option>
                        @endforeach
                    </select>
                    @error('label') <span>{{ $message }}</span> @enderror
                </div>
                <div>
                    <button class="submit-button" type="submit">Create Trick</button>
                </div>
            </form>
        </div>

    </section>

</x-layout>
