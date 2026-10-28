<x-layout>
@dump($user)
    <section>
        <h1>Edit Profile</h1>
        <form action="{{ route('myprofile.update', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}">
            </div>
            <button type="submit">Update</button>
        </form>
    </section>
</x-layout>
