<x-layouts.app title="{{__('Profile')}}">
    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ __('Verification link has been sent to your email!') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container px-5">
        <div class="row py-3">
            <div class="col px-auto">
                <h1 class="display-4">{{$user->name}}'s {{ __('profile') }}</h1>
            </div>
        </div>
        <div class="row py-3">
            <div class="col-3 d-flex justify-content-center">
                @if ($user->avatar_path)
                    <img src="{{ \Storage::url($user->avatar_path) }}"
                         alt="profile_pic" class="img-fluid rounded">
                @else
                    <img class="img-fluid rounded"
                         src="https://pic.onlinewebfonts.com/svg/img_87237.png"
                         alt="prof-image-test" style="max-height: 200px;">
                @endif
            </div>
            <div class="col d-flex flex-column">
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
                        @if($user->id == auth()->user()->id)
                        <p class="fs-5">
                            <span class="fw-bold">{{ __('Status of verification') }}</span>:
                            @if ($user->email_verified_at)
                                {{ __('Verified') }}
                            @else
                                {{ __('Not verified yet.') }}
                                <small class="text-secondary">
                                    <a onclick="event.preventDefault(); document.getElementById('verification-resend').submit();"
                                       href="#">Resend verification link</a>
                                </small>
                            @endif
                        </p>
                        @endif
                        <form id="verification-resend" action="{{ route('verification.send') }}" method="post">
                            @csrf
                        </form>
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
        @can('update', $user)
            <div class="row py-2">
                <div class="col">
                    <div class="d-grid">
                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">
                            {{ __('Edit your profile') }}</a>
                    </div>
                </div>
            </div>
        @endcan
    </div>
</x-layouts.app>
