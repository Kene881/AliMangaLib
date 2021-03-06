@foreach($comments as $comment)
    <div class="col display-comment">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <small>
                        <a href="{{ route('users.show', $comment->user) }}"
                           class="fs-6 text-dark">
                            {{ $comment->user->name }}
                        </a>
                        &dot; {{ $comment->updated_at->diffForHumans() }}
                    </small>
                    <p>{{ $comment->content }}</p>
                </div>
                <div class="d-flex align-items-center">
                    @can('create', App\Models\Comment::class)
                        <a class="btn create-button me-2" data-bs-toggle="collapse"
                           href="#replyForm-{{ $comment->id }}" role="button"
                           aria-expanded="false" aria-controls="collapseExample">
                            Add reply
                        </a>
                    @endcan
                    @can('delete', $comment)
                        <form action="{{ route('comments.destroy', $comment) }}" method="post">
                            @csrf @method('delete')
                            <button class="btn create-button">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
            @can('create', App\Models\Comment::class)
                <div class="card-body collapse" id="replyForm-{{ $comment->id }}">
                    <form method="post" action="{{ route('replies.store', $comment) }}">
                        @csrf
                        <div class="mb-3 d-flex">
                            <label>
                                <textarea class="form-control @error('content') is-invalid @enderror"
                                          id="content-{{$comment->id}}" name="content"></textarea>
                            </label>
                        </div>
                        <div class="col-md-3 float-left">
                            <button class="btn create-button">Reply</button>
                        </div>
                    </form>
                </div>
            @endcan
        </div>
        @include('partials._comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach
