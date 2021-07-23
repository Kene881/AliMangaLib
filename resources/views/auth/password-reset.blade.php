<x-layouts.auth :title="__('Update password')">

    <form action="{{ route('password.update') }}" method="post">
        @csrf

        <input type="hidden" name="token" value="{{ $request->token }}">

        <div class="row">
            <div class="col-md-12">
                <input placeholder="email" value="{{ old('email', $request->email) }}" class="input-style mt-3 @error('email') is-invalid @enderror" type="email" id="email" name="email" />
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

        <div class="row">
            <div class="col-md-12">
                <input placeholder="password" class="input-style mt-3" type="password" id="password_confirmation" name="password_confirmation" />
            </div>
        </div>

        <div class="row">

            <div class="col-md-8">

            </div>

            <div class="col-md-4">
                <button class="btn create-button float-right m-2">
                    {{ __('Update password') }}
                </button>
            </div>
        </div>
    </form>

</x-layouts.auth>
