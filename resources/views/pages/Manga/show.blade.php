<x-layouts.navbar title="{{ __('show manga') }}">
    <style>
        .display-comment .display-comment {
            margin-left: 40px
        }
    </style>
<div class="container" style="width: 70%;">

    <div class="row d-flex justify-content-start mt-3 manga-header-info">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <img style="width: 100%; height: 22vw;" class="rounded" src="{{ \Storage::url($manga->image_path) }}">
                </div>

                <div class="col-md-9">
                    <div class="card m-1">
                        <div class="card-footer">
                            <div class="row border rounded border-dark m-1 p-1">
                                <div class="col-md-3">
                                    <p class="text-muted">Title</p>
                                </div>
                                <div class="col-md-9">
                                    <p class="card-text">{{ $manga->title }}</p>
                                </div>
                            </div>

                            <div class="row border rounded border-dark m-1 p-1">
                                <div class="col-md-3">
                                    <p class="text-muted">Genre</p>
                                </div>
                                <div class="col-md-9">
                                    @if (!$manga->genre)
                                        <p class="card-text">None</p>
                                    @else
                                        <p class="card-text">{{ $manga->genre->name }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="row border rounded border-dark m-1 p-1">
                                <div class="col-md-3">
                                    <p class="text-muted">Description</p>
                                </div>
                                <div class="col-md-9">
                                    <p class="card-text">{{ $manga->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    --}}

                    @if (Auth::check() && auth()->user()->hasRole('admin'))
                    <div>
                        <form action="{{ route('manga.destroy', $manga) }}" method="post">
                            @csrf @method('delete')

                            <div class="row mt-4">
                                <div class="col-md-6 float-left">
                                    <a href="{{ route('manga.edit', $manga) }}" class="btn create-button">{{ __('EDIT') }}</a>
                                </div>

                                <div class="col-md-6 float-left">
                                    <button class="btn create-button">
                                        DELETE
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                    @endif

                    @auth
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <a href="{{ route('chapter.index', ['manga' => $manga]) }}" class="btn create-button">Go to chapters</a>
                        </div>
                    </div>
                    @else
                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                                <h1 class="text-danger">Please register to read</h1>
                            </div>
                        </div>
                    @endauth
{{--                    --}}
                </div>
            </div>

        </div>
    </div>

    @auth
    <div class="row d-flex justify-content-start mt-3 manga-header-info">
        <div class="container my-3">
            <div class="row py-4">
                <div class="col">
                    <h3 class="h1">{{ __('Comments') }}</h3>
                </div>
            </div>
            <hr>
            <div class="row py-4">
                @can('create', App\Models\Comment::class)
                    <div class="col-sm-12 py-3">
                        <h3 class="h4">{{ __('Leave your comment') }}</h3>
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
                            <div class="row justify-content-end">
                                <div class="col-md-4">
                                    <button class="btn create-button">Add comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endcan
                <div class="col-sm-12 py-3">
                    <h3 class="h4">{{ __('Other comments') }}</h3>
                    <div class="row row-cols-1 g-4">
                        @include('partials._comment_replies', ['comments' => $manga->comments])
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth

</div>
</x-layouts.navbar>
