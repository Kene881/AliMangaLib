
<x-layouts.app :title="__('Edit profile')">

    <h3 class="h1 m-5 text-center">Edit your profile</h3>

    <form class="card card-body m-5"
          action="{{ route('users.update', $user) }}" method="post">
        @csrf @method('put')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" type="text" id="name" name="name">
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sex" class="form-label">{{ __('Sex') }}</label>
            <select class="form-select @error('sex') is-invalid @enderror" name="sex" id="sex">
                <option value="hidden"
                    {{ old('sex', $user->sex ?? null) == "hidden" ? 'selected' : '' }}>
                    {{ __("Prefer not to tell") }}
                </option>
                <option value="male"
                    {{ old('sex', $user->sex ?? null) == "male" ? 'selected' : '' }}>
                    {{ __('Male') }}
                </option>
                <option value="female"
                    {{ old('sex', $user->sex ?? null) == "female" ? 'selected' : '' }}>
                    {{ __('Female') }}
                </option>
            </select>

            @error('sex')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" type="email" id="email" name="email">
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="about" class="form-label">{{ __('About') }}</label>
            <textarea class="form-control @error('about') is-invalid @enderror"
                      name="about" id="about">{{ old('about', $user->about ?? null) }}</textarea>
            @error('about')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">
            {{ __('Edit') }}
        </button>

    </form>

</x-layouts.app>
