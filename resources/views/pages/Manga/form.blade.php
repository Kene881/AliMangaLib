<?php
$manga = $manga ?? null;
?>

<x-layouts.app :title="__($manga ? 'Edit manga' : 'New manga')">

    <div class="row">
        <div class="col-4">
            <form class="card card-body"
                  action="{{ $manga ? route('manga.update', $manga) : route('manga.store') }}"
                  method="post"
                  enctype="multipart/form-data">
                @csrf @if($manga) @method('put') @endif

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Title') }}</label>
                    <input class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $manga->title ?? null) }}" type="text" id="title" name="title" />
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control @error('description') is-invalid @enderror "
                              name="description" id="description">{{ old('description', $manga->description ?? null) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="genre_id" class="form-label">{{ __('Genre') }}</label>
                    <select class="form-select @error('genre_id') is-invalid @enderror" name="genre_id" id="genre_id">
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" {{ old('genre_id', $manga->genre_id ?? null) == $genre->id ? 'selected' : '' }}>
                                {{ $genre->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('genre_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image_path" class="form-label">{{ __('Image') }}</label>
                    <input accept="image/*" class="form-control @error('image_path') is-invalid @enderror" type="file" id="image_path" name="image_path">
                    @error('image_path')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <button class="btn btn-primary">
                    {{__($manga ? 'Edit' : 'Add')}}
                </button>

            </form>
        </div>
    </div>

</x-layouts.app>
