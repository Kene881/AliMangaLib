<x-layouts.app title="{{ __('Manga') }}">
    <div class="card p-3">
        <div class="card-header">
            {{ $manga->title }}
        </div>

        <img src="{{ \Storage::url($manga->image_path) }}"
             class="img-fluid" alt="manga image" style="max-height: 250px;">
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
        </div>
    </div>
    <div class="container my-3">
        <div class="row py-4">
            <div class="col">
                <h3 class="h1">{{ __('Comments') }}</h3>
            </div>
        </div>
        <hr>
        <div class="row py-4">
            <div class="col-sm-12 col-xl-4 py-3">
                <h4 class="h3">{{ __('Leave your comment') }}</h4>
                <form action="{{ route('comments.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="content"></label>
                        <textarea class="form-control @error('content') is-invalid @enderror"
                                  id="content" name="content">{{ old('content') }}</textarea>
                        @error('content')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="manga_id" value="{{ $manga->id }}" />
                    <div>
                        <button class="btn btn-primary">Add comment</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-xl-8 py-3">
                <h4 class="h3">{{ __('Other comments') }}</h4>
                <div class="row row-cols-1 g-4">
                    @include('partials._comment_replies', ['comments' => $manga->comments])
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
