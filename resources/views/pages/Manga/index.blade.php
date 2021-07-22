<x-layouts.navbar title="{{ __('Manga') }}">
    <div class="container" style="width: 70%">
        <div class="row d-flex justify-content-start mt-3 manga-card-base">

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

                <button class="btn create-button">
                    {{ __('Filter') }}
                </button>
            </form>

            <div class="row mt-4">
                @if($mangas->isEmpty())
                    <div>
                        {{ __('Lots of manga coming soon') }}
                    </div>
                @else
                    @foreach($mangas as $manga)
                        <div class="col-md-3 mt-3">
                            <a href="{{ route('manga.show', $manga) }}">
                                <div class="card">
                                    <img src="{{ \Storage::url($manga->image_path) }}" style="width: 100%; height: 20vw; object-fit: cover;" class="manga-list-image" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">{{ $manga->title }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-layouts.navbar>

