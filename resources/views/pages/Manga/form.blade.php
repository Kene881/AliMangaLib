<?php
$manga = $manga ?? null;
?>

<x-layouts.navbar title="{{ __('add manga') }}">
    <div class="container" style="width: 50%;">

        <div class="row d-flex justify-content-start mt-3 manga-card-base">

            <div class="row">
                <div class="col-md-12 manga-header">Manga Creation</div>
            </div>

            <div class="row d-flex justify-content-start mt-3 manga-rules">
                <div class="row">
                    <div class="col-md-12">
                        <p>The manga will be rejected for the following reasons:</p>
                        <p>- If the manga belongs to genres that are not suitable for the site: hentai, bar, shootakon;</p>
                        <p>- If these are doujinshi / singles that have the genre: yaoi / yuri / erotica (that is, hentai genre manga); </p>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <span>Manga's cover</span>
            </div>

            <form action="{{ $manga ? route('manga.update', $manga) : route('manga.store') }}" method="post" enctype="multipart/form-data">
                @csrf @if($manga) @method('put') @endif

                <div class="row mt-2">
                    <div class="col-md-8">

                        <div class="mb-3">
                            <label for="image_path" class="form-label">{{ __('Image') }}</label>
                            <input accept="image/*" class="form-control @error('image_path') is-invalid @enderror" type="file" id="image_path" name="image_path">
                            @error('image_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

{{--                        <button class="manga-cover-button">--}}
{{--                            <img class="fullWHImage" src="https://ajaxuploader.com/document/scr/images/drag-drop-file-upload.png">--}}
{{--                        </button>--}}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <input class="input-style mt-3 @error('title') is-invalid @enderror" value="{{ old('title', $manga->title ?? null) }}" type="text" id="title" name="title" placeholder="Title"/>
                        @error('title')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <textarea class="input-style mt-3 @error('description') is-invalid @enderror "
                                  name="description" id="description" placeholder="Description">{{ old('description', $manga->description ?? null) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-4">
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
                </div>

                <div class="row mt-4">
                    <button class="create-button">
                        {{__($manga ? 'Edit' : 'Add')}}
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-layouts.navbar>



