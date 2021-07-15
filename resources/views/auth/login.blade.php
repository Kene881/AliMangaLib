<x-layouts.auth :title="__('Login')">

    <form action="{{ route('login') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" id="email" name="email" />
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" />
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input {{ old('remember') ? 'checked' : '' }} name="remember" id="remember" type="checkbox" class="form-check-input" />
            <label for="remember" class="form-check-label">
                {{ __('Remember') }}
            </label>
        </div>

        <div class="d-flex align-items-center justify-content-between">

            @if(\Route::has('password.email'))
                <a href="{{ route('password.email') }}">
                    {{ __('Forgot password?') }}
                </a>
            @else
                <span></span>
            @endif

            <button class="btn btn-primary">
                {{ __('Login') }}
            </button>
        </div>
    </form>

</x-layouts.auth>
