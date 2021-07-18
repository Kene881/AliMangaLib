<?php
$previous = url()->previous();

if(request()->fullUrlIs($previous))
    $previous = route('news.news.index');

$one_news = $one_news ?? null;

?>

<x-layouts.app :title="__($one_news ? 'Edit one_news' : 'New one_news')">

    <a class="btn btn-outline-danger" href="{{ $previous }}">
        {{__('Cancel')}}
    </a>

    <div class="row">
        <div class="col-4">
            <form class="card card-body"
                  action="{{ $one_news ? route('news.news.update', $one_news) : route('news.news.store') }}"
                  method="post">
                @csrf @if($one_news) @method('put') @endif

                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('Title') }}</label>
                    <input class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $one_news->title ?? null) }}" type="text" id="title" name="title" />
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <textarea class="form-control @error('description') is-invalid @enderror "
                              name="description" id="description">{{ old('description', $one_news->description ?? null) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">
                    {{__($one_news ? 'Edit' : 'Add')}}
                </button>

            </form>
        </div>
    </div>

</x-layouts.app>
