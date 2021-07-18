<h1>{{ $forum->title }}</h1>

<a href="{{route('forums.index')}}">All forums</a>

<div>
    <small>Created at: {{$forum->created_at}}</small>
</div>

<div>
    <small>Author at: {{ $forum->user->name }}</small>
</div>


<p>{{ $forum->description }}</p>

@can('update', $forum)


<a href="{{route('forums.edit', $forum)}}">Edit post</a>

@endcan

<form action="{{route('forums.destroy', $forum)}}" method="post">
    @csrf
    @method('delete')

    @can('delete', $forum)

    <button>Delete forum</button>
    @endcan
</form>
