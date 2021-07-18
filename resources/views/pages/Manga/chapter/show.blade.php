<x-layouts.app title="{{ __('Read chapter') }}">
    {{ $chapter->name }}

    @foreach($images_path as $path)
        <div>
            <img src="{{ \Storage::url($path) }}">
        </div>
    @endforeach
</x-layouts.app>
