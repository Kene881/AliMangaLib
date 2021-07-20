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
    <div class="container my-5">
        <div class="row py-4">
            <div class="col">
                <h3 class="h1">{{ __('Comments') }}</h3>
            </div>
        </div>
        <hr>
        <div class="row py-4">
            <div class="col-sm-12 col-xl-4">
                <h4 class="h3">{{ __('Leave your comment') }}</h4>
                <form action="{{ route('comments.store', $manga) }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Title of comment</label>
                        <input class="form-control @error('title') is-invalid @enderror" name="title" id="title" type="text" value="{{ old('title') }}">
                        @error('title')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="content">{{ __('Your comment') }}</label>
                        <textarea class="form-control @error('content') is-invalid @enderror"
                                  id="content" name="content">{{ old('content') }}</textarea>
                        @error('content')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <button class="btn btn-primary">Add comment</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-12 col-xl-8 mt-5">
                <div class="row row-cols-1 g-4">
                    @forelse($manga->comments as $comment)
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-between">
                                        @if ($comment->title)
                                            {{ $comment->title }}
                                        @endif
                                        @if ($comment->user)
                                            <div class="d-flex">
                                                {{--                                            @if ($comment->user->avatar_path)
                                                                                                <img src="{{ \Storage::url($comment->user->avatar_path) }}"
                                                                                                     alt="profile_pic" class="card-img-top" style="max-width: 64px;">
                                                                                            @endif--}}
                                                <cite class="fs-6">
                                                    <a class="link-secondary" href="{{ route('users.show', $comment->user) }}">
                                                        By {{ $comment->user->name }}</a>
                                                </cite>
                                            </div>
                                        @else
                                            <div class="d-flex">
                                                {{ __('DELETED') }}
                                            </div>
                                        @endif
                                    </h5>
                                    <p class="card-text">{{ $comment->content }}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted d-flex justify-content-between">
                                        <span>
                                            {{ $comment->updated_at->diffForHumans() }}
                                        </span>
                                        <a href="#" class="link-danger"
                                           onclick="event.preventDefault(); document.getElementById('delete-comment-{{ $comment->id }}').submit();">
                                            Delete comment
                                        </a>
                                    </small>
                                </div>
                            </div>
                            <form id="delete-comment-{{ $comment->id }}"
                                  action="{{ route('comments.destroy', $comment) }}" method="post">
                                @csrf @method('delete')
                            </form>
                        </div>
                    @empty
                        <div class="d-flex justify-content-center align-items-center">
                            No comments there...
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
