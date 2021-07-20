<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>

        <ul class="navbar-nav me-auto">
            {{ $slot }}
        </ul>

        <ul class="navbar-nav">

            @if($userBar ?? false)
                {{ $userBar }}
            @endif

            @auth

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" role="button" id="user_dropdown" data-bs-toggle="dropdown">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="user_dropdown">
                        <a href="#" class="dropdown-item"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="post">
                            @csrf
                        </form>
                        <a href="{{ route('users.show', auth()->user()) }}" class="dropdown-item">
                            {{ __('Profile') }}
                        </a>
                    </ul>
                </li>

            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                </li>
                <li class="nav-item ms-2">
                    <a class="btn btn-primary" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </li>
            @endauth

        </ul>
    </div>
</nav>
