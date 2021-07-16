<x-layouts.app title="{{ __('Manga') }}">
    <a href="{{ route('manga.create') }}" class="btn btn-primary">Add manga</a>
    @if($mangas->isEmpty())

        <div>
            {{ __('Lots of manga coming soon') }}
        </div>
    @else

        @foreach($mangas as $manga)
            <div class="d-inline card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{ \Storage::url($manga->image_path) }}" class="card-img" alt="This is main page of this manga">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('manga.show', $manga) }}">{{ $manga->title }}</a></h5>
                            <p class="card-text">{{ $manga->description }}</p>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    @endif
</x-layouts.app>
