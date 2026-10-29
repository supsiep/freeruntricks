<x-layout>
    <section style="margin: 2rem 20vw">
        <h1>Edit Profile</h1>
        <div class="change-info">
            <h2>Change Information</h2>
        <form action="{{ route('myprofile.update-info', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}">
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}">
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <button class="submit-button" type="submit">Update</button>
        </form>
        </div>
{{--        <div class="change-password">--}}
{{--            <h2>Change Password</h2>--}}
{{--            <form action="{{ route('myprofile.update-password', $user->id) }}" method="POST">--}}
{{--                @csrf--}}
{{--                @method('PATCH')--}}
{{--                <div>--}}
{{--                    <label for="password">New Password:</label>--}}
{{--                    <input type="password" name="password" id="password">--}}
{{--                    @error('password')--}}
{{--                        <p>{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <label for="password_confirmation">Confirm Password:</label>--}}
{{--                    <input type="password" name="password_confirmation" id="password_confirmation">--}}
{{--                    @error('password_confirmation')--}}
{{--                        <p>{{ $message }}</p>--}}
{{--                    @enderror--}}
{{--                </div>--}}
{{--                <button class="submit-button" type="submit">Update Password</button>--}}
{{--            </form>--}}
{{--        </div>--}}
    </section>
</x-layout>
