<x-layouts.navbar title="Chapters">

    <div class="container" style="width: 50%;">
        <div class="row d-flex justify-content-start mt-3">

            <div class="row">
                <div class="col-md-12">
                    <a class="btn create-button" href="{{ route('chapter.index', $chapter->manga) }}">All chapters</a>
                </div>
            </div>

            @if (Auth::check() && auth()->user()->hasRole('admin'))
                <div class="row mt-4">
                    <div class="col-md-12">
                        <a href="{{ route('chapter.edit', ['chapter' => $chapter, 'manga' => $chapter->manga]) }}"
                           class="btn create-button">Edit Chapter</a>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <form action="{{ route('chapter.destroy', $chapter) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn create-button">
                                {{ __('DELETE') }}
                            </button>
                        </form>
                    </div>
                </div>
            @endif

            @foreach($images_path as $path)
                <div class="col-md-12 mt-4">
                    <img class="fullWHImage" src="{{ \Storage::url($path) }}">
                </div>
            @endforeach


        </div>
    </div>

</x-layouts.navbar>
