@props(['title' => null])

<x-layouts.base :title="$title" {{ $attributes }}>

    <style>
        .display-comment .display-comment {
            margin-left: 40px
        }
    </style>
    <x-partials.navbar>

        <x-partials.navbar.link href="{{ url('/') }}">
            {{__('Home')}}
        </x-partials.navbar.link>

    </x-partials.navbar>

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                {{ $slot }}
            </div>
        </div>
    </div>

</x-layouts.base>
