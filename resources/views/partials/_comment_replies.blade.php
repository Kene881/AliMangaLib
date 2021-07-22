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
                    <a class="btn btn-primary me-2" data-bs-toggle="collapse"
                       href="#replyForm-{{ $comment->id }}" role="button"
                       aria-expanded="false" aria-controls="collapseExample">
                        Add reply
                    </a>
                    <form action="{{ route('comments.destroy', $comment) }}" method="post">
                        @csrf @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
            <div class="card-body collapse" id="replyForm-{{ $comment->id }}">
                <form method="post" action="{{ route('replies.store', $comment) }}">
                    @csrf
                    <div class="mb-3 d-flex">
                            <textarea class="form-control @error('content') is-invalid @enderror"
                                      id="content" name="content"></textarea>
                        @error('content')
                        <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <button class="btn btn-primary">Reply</button>
                    </div>
                </form>
            </div>
        </div>
        @include('partials._comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach
