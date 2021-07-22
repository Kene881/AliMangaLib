<x-layouts.app title="{{ __('Read chapter') }}">

    <a href="{{ route('chapter.index', $chapter->manga) }}">All chapters</a>

    <div>
        <a href="{{ route('chapter.edit', ['chapter' => $chapter, 'manga' => $chapter->manga]) }}" class="btn btn-primary">{{ __('EDIT') }}</a>
        <form action="{{ route('chapter.destroy', $chapter) }}" method="post">
            @csrf
            @method('delete')
            <button class="btn">
                {{ __('DELETE') }}
            </button>
        </form>
    </div>

    @foreach($images_path as $path)
        <div class="text-center">
            <img height="800px" width="600px" src="{{ \Storage::url($path) }}">
            <hr/>
        </div>
    @endforeach


</x-layouts.app>
