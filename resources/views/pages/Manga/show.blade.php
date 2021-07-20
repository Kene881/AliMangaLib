<x-layouts.app title="{{ __('Manga') }}">

    <a href="{{ route('manga.index') }}">All manga</a>

    <div class="card p-3">
        <div class="card-header">
            {{ $manga->title }}
        </div>

        <img src="{{ \Storage::url($manga->image_path) }}" class="img-fluid" alt="manga image">
        <div class="card-body">
            {{ $manga->description }}
        </div>

        <div class="card-footer">
            <a href="{{ route('manga.edit', $manga) }}" class="btn btn-success">{{ __('EDIT') }}</a>
            <form action="{{ route('manga.destroy', $manga) }}" method="post">
                @csrf @method('delete')
                <button class="btn btn-danger">
                    DELETE
                </button>
            </form>

            <hr/>

            <a href="{{ route('chapter.index', ['manga' => $manga]) }}" class="btn btn-primary">Chapters</a>
        </div>
    </div>
</x-layouts.app>
