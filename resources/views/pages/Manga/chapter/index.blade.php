<x-layouts.navbar title="Chapters">
    <div class="container" style="width: 50%;">

        <div class="row d-flex justify-content-start mt-3 manga-header-info">

            <div class="row">
                <div class="col-md-4">
                    <h3>{{ $manga->title }}</h3>
                </div>
            </div>

            @if (Auth::check() && auth()->user()->hasRole('admin'))
            <div class="row mt-4">
                <div class="col-md-12">
                    <a class="btn create-button" href="{{ route('chapter.create', $manga) }}">Add chapters</a>
                </div>
            </div>
            @endif

            <div class="row mt-4">
                <div class="col-md-4">
                    <h2>Chapters:</h2>
                    @if($chapters->isEmpty())
                        {{ __('Nothing') }}
                    @else
                        @foreach($chapters as $chapter)
                            <div class="col-md-12">
                                <a href="{{ route('chapter.show', $chapter) }}">{{ $chapter->name }}</a>
                                <hr>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4">
                    <a class="btn create-button" href="{{ route('manga.show', $manga) }}">Back to manga</a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.navbar>



