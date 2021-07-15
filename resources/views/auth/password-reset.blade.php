<x-layouts.auth :title="__('Update password')">

    <form action="{{ route('password.update') }}" method="post">
        @csrf

        <input type="hidden" name="token" value="{{ $request->token }}">

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input value="{{ old('email', $request->email) }}" class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" />
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
                {{ __('Update password') }}
            </button>
        </div>
    </form>

</x-layouts.auth>
