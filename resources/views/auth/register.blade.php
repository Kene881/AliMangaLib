<x-layouts.auth :title="__('Register')">
    <div class="text-center">
        <h3>Register</h3>
    </div>
        <form action="{{ route('register') }}" method="post">
            @csrf

            <div class="row">
                <div class="col-md-12">
                    <input placeholder="name" class="input-style mt-3 @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" id="name" name="name" />
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

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

            <div class="mb-3">
                <input placeholder="repeat password" class="input-style mt-3 " type="password" id="password_confirmation" name="password_confirmation" />
            </div>

            <div class="d-flex align-items-center justify-content-end">
                <button class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
</x-layouts.auth>
