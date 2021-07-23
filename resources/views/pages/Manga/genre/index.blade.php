<x-layouts.navbar title="{{ __('List Genre') }}">

    <a href="{{ route('genre.create') }}">{{ __('Add new genre') }}</a>

    @if($genres->isEmpty())
        <div>
            {{ __('genres not added yet') }}
        </div>
    @else
        @foreach($genres as $genre)
            <div>
               {{ $genre->name }}
                <div>
                    <a href="{{ route('genre.edit', $genre) }}" class="btn btn-success">{{ __('EDIT') }}</a>
                    <form action="{{ route('genre.destroy', $genre) }}" method="post">
                        @csrf @method('delete')
                        <button class="btn btn-danger">
                            {{ __('DELETE') }}
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</x-layouts.navbar>
