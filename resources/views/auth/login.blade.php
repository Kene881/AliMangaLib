<x-layouts.auth :title="__('Login')">


    <form action="{{ route('login') }}" method="post">
        @csrf

        <div class="row">
            <div class="col-md-12">
                <input placeholder="email" class="input-style mt-3 @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" id="email" name="email" />
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <input placeholder="password" class="input-style mt-3 @error('password') is-invalid @enderror" type="password" id="password" name="password" />
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-check mb-3">
            <input {{ old('remember') ? 'checked' : '' }} name="remember" id="remember" type="checkbox" class="form-check-input" />
            <label for="remember" class="form-check-label">
                {{ __('Remember') }}
            </label>
        </div>
{{--     d-flex align-items-center           justify-content-between--}}
        <div class="row">

            @if(\Route::has('password.email'))
                <div class="col-md-9">
                    <a href="{{ route('password.email') }}">
                        {{ __('Forgot password?') }}
                    </a>
                </div>
            @else
                <span></span>
            @endif

            <div class="col-md-3">
                <button class="btn create-button">
                    {{ __('Login') }}
                </button>
            </div>

        </div>
    </form>

</x-layouts.auth>
