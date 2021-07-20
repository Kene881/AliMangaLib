<?php
$chapter = $chapter ?? null;
?>

<x-layouts.app :title="__($chapter ? 'Edit chapter' : 'New chapter')">

    <div class="row">
        <div class="col-4">
            <form class="card card-body"
                  action="{{ $chapter ? route('chapter.update', $chapter) : route('chapter.store') }}"
                  method="post"
                  enctype="multipart/form-data">
                @csrf
                @if($chapter)
                    @method('put')
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $chapter->name ?? null) }}" type="text" id="name" name="name" />
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="path_to_images" class="form-label">{{ __('Images') }}</label>
                    <input accept="image/*" class="form-control @error('path_to_images') is-invalid @enderror" type="file" id="path_to_images" name="path_to_images[]" multiple>
                    @error('path_to_images')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <input type="hidden" name="manga_id" value="{{ $manga->id }}">

                <button class="btn btn-primary">
                    {{__($chapter ? 'Edit' : 'Add')}}
                </button>

            </form>
        </div>
    </div>

</x-layouts.app>
