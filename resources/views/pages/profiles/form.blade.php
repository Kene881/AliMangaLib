
<x-layouts.navbar :title="__('Edit profile')">

    <div class="container" style="width: 70%">
        <h3 class="h1 m-5 text-center">Edit your profile</h3>

        <div class="d-flex flex-column align-items-center">
            @if ($user->avatar_path)
                <img src="{{ \Storage::url($user->avatar_path) }}"
                     alt="profile_pic" class="img-fluid rounded"
                     style="max-height: 200px;">
                @can('delete', $user)
                <form action="{{ route('users.deleteImage', $user) }}" method="post">
                    @csrf @method('delete')
                    <button class="btn btn-danger">{{ __('Delete avatar image') }}</button>
                </form>
                @endcan
            @else
                <img class="img-fluid rounded"
                     src="{{ Storage::url('users/default_img/no_avatar.png') }}"
                     alt="prof-image-test" style="max-height: 200px;">
            @endif
        </div>

        <form enctype="multipart/form-data" class="card card-body m-5"
              action="{{ route('users.update', $user) }}" method="post">
            @csrf @method('put')

            <div class="mb-3">
                <label for="avatar_path" class="form-label">{{ __('Profile image') }}</label>
                <input class="form-control @error('avatar_path') is-invalid @enderror" type="file" id="avatar_path" name="avatar_path">
                @error('avatar_path')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

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

            @can('update', $user)
            <button class="btn create-button">
                {{ __('Edit') }}
            </button>
            @endcan
        </form>
    </div>


</x-layouts.navbar>
