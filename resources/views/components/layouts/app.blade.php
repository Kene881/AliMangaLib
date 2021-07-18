@props(['title' => null])

<x-layouts.base :title="$title" {{ $attributes }}>

    <x-partials.navbar>

        <x-partials.navbar.link href="{{ url('/') }}">
            {{__('Home')}}
        </x-partials.navbar.link>

    </x-partials.navbar>

    <div class="container m-3">
        {{$slot}}
    </div>

</x-layouts.base>
