{{--<x-layouts.base :title="$title" {{ $attributes }}>--}}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{config('app.name', 'MangaLib')}}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
</head>
<body>


<div class="container-fluid navbar-base">
    <div class="row navbar-container" style="text-align: center">

        <div class="col-md-4 d-flex justify-content-center">
            <a href="/">
                <img src="https://mangalib.me/images/manga.png?435">
            </a>
        </div>

        <div class="col-md-1 d-flex justify-content-center">
            <button class="navbar-button">
                <a href="{{ route('manga.index') }}">Catalog</a>
            </button>
        </div>
        <div class="col-md-1 d-flex justify-content-center">
            <button class="navbar-button">
                <a href="{{ route('news.news.index') }}">News</a>
            </button>
        </div>


        @if (Auth::check() && auth()->user()->hasRole('admin'))
            <div class="col-md-1 d-flex justify-content-center">
                <button class="navbar-button">
                    <a href="{{ route('genre.index') }}">Genre</a>
                </button>
            </div>

            <div class="col-md-3">
                <div></div>
            </div>

            <div class="col-md-auto d-flex justify-content-center">
                <button class="navbar-button-img">
                    <a href="{{ route('manga.create') }}">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Orange_plus.svg/300px-Orange_plus.svg.png">
                    </a>
                </button>
            </div>
        @else
            <div class="col-md-3">
                <div></div>
            </div>
        @endif

        @auth
            <div class="col-md-auto d-flex justify-content-center">
                <button class="navbar-button-img">
                    <a href="{{ route('users.show', auth()->user()) }}">
                        @if (auth()->user()->avatar_path)
                            <img class="border border-dark rounded" src="{{ Storage::url(auth()->user()->avatar_path) }}">
                        @else
                            <img class="border border-dark rounded" src="{{ Storage::url('users/default_img/no_avatar.png') }}">
                        @endif
                    </a>
                </button>
            </div>
        @else
{{--            <div class="col-md-3">--}}
{{--                <div></div>--}}
{{--            </div>--}}
            <div class="col-md-1 d-flex justify-content-center">
                <button class="navbar-button">
                    <a href="{{ route('register') }}">Register</a>
                </button>
            </div>

            <div class="col-md-1 d-flex justify-content-center">
                <button class="navbar-button">
                    <a href="{{ route('login') }}">Login</a>
                </button>
            </div>
        @endauth
    </div>
</div>

{{ $slot }}

</body>
</html>

{{--</x-layouts.base>--}}
