<x-layouts.base :title="$title" {{ $attributes }}>
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
                <img src="https://mangalib.me/images/manga.png?435">
            </div>


            <div class="col-md-auto d-flex justify-content-center">
                <button class="navbar-button">Catalog</button>
            </div>

            <div class="col-md-auto d-flex justify-content-center">
                <button class="navbar-button">Search</button>
            </div>

            <div class="col-md-auto d-flex justify-content-center">
                <button class="navbar-button">Random</button>
            </div>


            <div class="col-md-3">
                <div></div>
            </div>


            <div class="col-md-auto d-flex justify-content-center">
                <button class="navbar-button-img">
                    <img src="https://img.icons8.com/plasticine/2x/pencil.png">
                </button>
            </div>

            <div class="col-md-auto d-flex justify-content-center">
                <button class="navbar-button">...</button>
            </div>

            <div class="col-md-auto d-flex justify-content-center">
                <button class="navbar-button">...</button>
            </div>

            <div class="col-md-auto d-flex justify-content-center">
                <button class="navbar-button">...</button>
            </div>

            <div class="col-md-auto d-flex justify-content-center">
                <button class="navbar-button-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSMlQkALCBYHVFD3CFjVVOmq7Vcu64QhAAj8Q&usqp=CAU">
                </button>
            </div>
        </div>
    </div>

    {{ $slot }}

    </body>
    </html>

</x-layouts.base>
