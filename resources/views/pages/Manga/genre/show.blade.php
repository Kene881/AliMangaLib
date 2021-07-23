<x-layouts.navbar>
    <div class="text-center">
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
</x-layouts.navbar>
