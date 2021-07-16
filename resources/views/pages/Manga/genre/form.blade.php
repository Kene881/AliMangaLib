<?php
$genre = $genre ?? null;
?>

<x-layouts.app :title="__($genre ? 'Edit genre' : 'New genre')">

    <div class="row">
        <div class="col-4">
            <form class="card card-body"
                  action="{{ $genre ? route('genre.update', $genre) : route('genre.store') }}"
                  method="post"
                  enctype="multipart/form-data">
                @csrf @if($genre) @method('put') @endif

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $genre->name ?? null) }}" type="text" id="name" name="name" />
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">
                    {{__($genre ? 'Edit' : 'Add')}}
                </button>

            </form>
        </div>
    </div>

</x-layouts.app>
