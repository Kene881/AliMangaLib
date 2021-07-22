<?php
$previous = url()->previous();

if(request()->fullUrlIs($previous))
    $previous = route('news.news.index');

$news = $news ?? null;

?>

<x-layouts.navbar :title="__($news ? 'Edit news' : 'New news')">


    <div class="container mt-4" style="width: 50%;">

        <div class="row d-flex justify-content-start news-card-base">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                        <h3>Create news</h3>
                    </div>
                </div>
                <form action="{{ $news ? route('news.news.update', $news) : route('news.news.store') }}"
                      method="post">
                    @csrf @if($news) @method('put') @endif

                    <div class="row">
                        <div class="col-md-12">
                            <input class="input-style mt-3 @error('title') is-invalid @enderror" value="{{ old('title', $news->title ?? null) }}" placeholder="Title" name="title" id="title" />
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <input class="input-style mt-3 @error('description') is-invalid @enderror" value="{{ old('description', $news->description ?? null) }}" placeholder="Description" name="description" id="description" />
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-3 me-0">
                            <button class="create-button btn">{{__($news ? 'Edit' : 'Create')}}</button>
                        </div>
                        <div class="col-md-2">
                            <a class="cancel-button btn" href="{{ $previous }}">Cancel</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-layouts.navbar>
