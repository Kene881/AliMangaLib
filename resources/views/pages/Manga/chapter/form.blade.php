<?php
$chapter = $chapter ?? null;
?>

<x-layouts.navbar title="Chapters">

    <div class="container" style="width: 50%;">

        <div class="row d-flex justify-content-start mt-3 manga-card-base">
            <a href="{{ route('chapter.index', ['manga' => $manga]) }}" class="btn create-button">Go to chapters</a>
            <div class="row">
                <div class="col-md-12 manga-header">Chapter Creation</div>
            </div>

            <form action="{{ $chapter ? route('chapter.update', $chapter) : route('chapter.store') }}"
                  method="post"
                  enctype="multipart/form-data">
                @csrf
                @if($chapter)
                    @method('put')
                @endif

                <div class="row mt-2">
                    <div class="col-md-8">
                        <label for="path_to_images" class="form-label">{{ __('Images') }}</label>
                        <input accept="image/*" class="form-control @error('path_to_images') is-invalid @enderror" type="file" id="path_to_images" name="path_to_images[]" multiple>
                        @error('path_to_images')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">

                        <input placeholder="Title" class="input-style mt-3 @error('name') is-invalid @enderror" value="{{ old('name', $chapter->name ?? null) }}" type="text" id="name" name="name" />
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <input type="hidden" name="manga_id" value="{{ $manga->id }}">

                <div class="row mt-4">
                    <div class="col-md-12">
                        <button class="btn create-button">
                            {{__($chapter ? 'Edit' : 'Add')}}
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</x-layouts.navbar>
