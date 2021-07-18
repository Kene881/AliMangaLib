<x-layouts.app title="chapter">
    {{ $manga->title }}
    <a class="btn btn-success" href="{{ route('chapter.create', $manga) }}">Add chapter</a>

    @if($chapters->isEmpty())
        {{ __('Nothing') }}
    @else
        <div>
            <ol>
                @foreach($chapters as $chapter)
                    <li><a href="{{ route('chapter.show', $chapter) }}">{{ $chapter->name }}</a></li>
                @endforeach
            </ol>
        </div>
    @endif

</x-layouts.app>
