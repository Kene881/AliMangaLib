
<h1>Forums</h1>
<a href="{{ route('forums.create') }}">Go to form</a>

@if($forums->isNotEmpty())
    <ol>

        @foreach($forums as $forum)
            <h1>{{ $forum->user->name }}</h1>
            <li value="{{$forum->id}}">
                <a href="{{ route('forums.show', $forum) }}">
                    {{ $forum->title }}
                </a>
            </li>
        @endforeach
    </ol>
@else


    <h1>Nothing new here, come later ;)</h1>
@endif
