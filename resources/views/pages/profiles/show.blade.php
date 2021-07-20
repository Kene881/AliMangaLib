<x-layouts.app title="{{__('Profile')}}">
    <div class="container px-5 mx-5">
        <div class="row py-3">
            <div class="col px-auto">
                <h1 class="display-4">{{ __('Your profile') }}</h1>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-3 text-center">
                <img class="img-fluid rounded"
                     src="https://pic.onlinewebfonts.com/svg/img_87237.png"
                     alt="prof-image-test" style="max-height: 200px;">
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="fs-5">
                            <span class="fw-bold">{{ __('Username') }}</span>:
                            {{ $user->name }}
                        </p>
                        <p class="fs-5">
                            <span class="fw-bold">{{ __('Email') }}</span>:
                            {{ $user->email }}
                        </p>
                        <p class="fs-5">
                            <span class="fw-bold">{{ __('Gender') }}</span>:
                            {{ $user->sex }}
                        </p>
                        <p class="fs-5">
                            <span class="fw-bold">{{ __('Date of registration') }}</span>:
                            {{ $user->created_at->format('d/m/Y') }}
                        </p>
                        <a href="#" class="btn btn-outline-info">{{ __('Show more info') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @if ($user->about)
            <div class="row py-2">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-3">{{ __('About user') }}:</p>
                            <p class="fs-5">{{ $user->about }}</p>
                        </div>
                    </div>

                </div>
            </div>
        @endif
        <div class="row py-2">
            <div class="col">
                <div class="d-grid">
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">
                        {{ __('Edit your profile') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
