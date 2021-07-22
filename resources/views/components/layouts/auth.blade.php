@props(['title' => null])

<x-layouts.navbar :title="$title" {{ $attributes }}>

{{--    <div class="container p-3">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-4">--}}
{{--                --}}{{--display-5--}}
{{--                <h1 class="h4 text-secondary mb-3 text-center">{{ $title }}</h1>--}}

{{--                <div class="card card-body">--}}
{{--                    {{ $slot }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="container" style="width: 40%">
        <div class="row d-flex justify-content-start mt-3 manga-card-base">
            {{ $slot }}
        </div>
    </div>

</x-layouts.navbar>
