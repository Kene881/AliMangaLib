<x-layouts.auth :title="__('Reset password')">

    <form action="{{ route('password.email') }}" method="post">
        @csrf

        @if(session('status'))
            <div class="alert alert-success mb-3">
                {{ session('status') }}
            </div>
        @endif
        <div class="mb-3">
            <input placeholder="email" class="input-style mt-3 @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" id="email" name="email" />
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center justify-content-end">
            <button class="btn create-button">
                {{ __('Send reset link') }}
            </button>
        </div>
    </form>

</x-layouts.auth>
