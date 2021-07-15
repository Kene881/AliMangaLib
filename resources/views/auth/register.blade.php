<x-layouts.auth :title="__('Register')">

    <form action="{{ route('register') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" id="name" name="name" />
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

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

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('Password confirmation') }}</label>
            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" />
        </div>

        <div class="d-flex align-items-center justify-content-end">
            <button class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </form>

</x-layouts.auth>
