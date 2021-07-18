<x-layouts.app title="{{ __('List Genre') }}">

    <a href="{{ route('genre.create') }}">{{ __('Add new genre') }}</a>

    @if($genres->isEmpty())
        <div>
            {{ __('genres not added yet') }}
        </div>
    @else
        @foreach($genres as $genre)
            <div><a href="{{ route('genre.show', $genre) }}">{{ $genre->name }}</a></div>
        @endforeach
    @endif
</x-layouts.app>
