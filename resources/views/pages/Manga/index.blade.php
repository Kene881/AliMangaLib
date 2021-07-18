<x-layouts.app title="{{ __('Manga') }}">
    <a href="{{ route('manga.create') }}" class="btn btn-primary">Add manga</a>

    <form action="{{ route('filter') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="genre_id" class="form-label">{{ __('Genre') }}</label>
            <select class="form-select @error('genre_id') is-invalid @enderror" name="genre_id" id="genre_id">

                <option value="all">{{ __('All manga') }}</option>

                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
            @error('genre_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">
            {{ __('Filter') }}
        </button>
    </form>

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
