<?php
$genre = $genre ?? null;
?>

<x-layouts.navbar :title="__($genre ? 'Edit genre' : 'New genre')">
    <div class="container" style="width: 40%;">
        <div class="row d-flex justify-content-start mt-3 manga-header-info">
            <form class="card card-body"
                  action="{{ $genre ? route('genre.update', $genre) : route('genre.store') }}"
                  method="post"
                  enctype="multipart/form-data">
                @csrf @if($genre) @method('put') @endif

                <div class="mb-3">
                    <input placeholder="name genre" class="input-style mt-3 @error('name') is-invalid @enderror" value="{{ old('name', $genre->name ?? null) }}" type="text" id="name" name="name" />
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row justify-content-end">
                    <div class="col-md-3">
                        <button class="btn create-button">{{__($genre ? 'Edit' : 'Add')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.navbar>
