<?php
$previous = url()->previous();

if(request()->fullUrlIs($previous))
    $previous = route('news.news.index');

$news = $news ?? null;

?>

<x-layouts.app :title="__($news ? 'Edit news' : 'New news')">

    <a class="btn btn-outline-danger" href="{{ $previous }}">
        {{__('Cancel')}}
    </a>

    <div class="row">
        <div class="col-4">
            <form class="card card-body"
                  action="{{ $news ? route('news.news.update', $news) : route('news.news.store') }}"
                  method="post">
                @csrf @if($news) @method('put') @endif

                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('Title') }}</label>
                    <input class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $news->title ?? null) }}" type="text" id="title" name="title" />
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control @error('description') is-invalid @enderror "
                              name="description" id="description">{{ old('description', $news->description ?? null) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">
                    {{__($news ? 'Edit' : 'Add')}}
                </button>

            </form>
        </div>
    </div>

</x-layouts.app>
