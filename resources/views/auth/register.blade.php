<x-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required>
            @error('name')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email">{{ __('Email Address') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>
        </div>

        {{-- <div> --}}
        {{--     <label for="logo">{{ __('Logo') }}</label> --}}
        {{--     <input id="logo" type="file" name="logo" required> --}}
        {{--     @error('logo') --}}
        {{--         <span>{{ $message }}</span> --}}
        {{--     @enderror --}}
        {{-- </div> --}}

        <div>
            <button type="submit">{{ __('Register') }}</button>
        </div>
    </form>
</x-layout>
