<x-layouts.navbar title="{{ __('show manga') }}">
<div class="container" style="width: 50%;">

    <div class="row d-flex justify-content-start mt-3 manga-header-info">
        <div class="col-md-12">

            <div class="card" style="">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="">
                            <img class="fullWHImage" style="width: 100%; height: 20vw;" src="{{ \Storage::url($manga->image_path) }}" class="card-img">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row border rounded border-dark m-1 p-1">
                        <div class="col-md-2">
                            <p class="text-muted">Title</p>
                        </div>
                        <div class="col-md-10">
                            <p class="card-text">{{ $manga->title }}</p>
                        </div>
                    </div>

                    <div class="row border rounded border-dark m-1 p-1">
                        <div class="col-md-2">
                            <p class="text-muted">Genre</p>
                        </div>
                        <div class="col-md-10">
                            <p class="card-text">{{ $manga->genre->name }}</p>
                        </div>
                    </div>

                    <div class="row border rounded border-dark m-1 p-1">
                        <div class="col-md-2">
                            <p class="text-muted">Description</p>
                        </div>
                        <div class="col-md-10">
                            <p class="card-text">{{ $manga->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <h2>{{ $manga->title }}</h2>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row mt-4">--}}
{{--                <div class="col-md-4">--}}
{{--                    <img class="fullWHImage" src="{{ \Storage::url($manga->image_path) }}">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row mt-4">--}}
{{--                <div class="col-md-2">--}}
{{--                    <h4>Description</h4>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row mt-4">--}}
{{--                <div class="col-md-12">--}}
{{--                    <span>{{ $manga->description }}</span>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row mt-4">--}}
{{--                <div class="col-md-12">--}}
{{--                    <span>Genre</span>: {{ $manga->genre->name }}--}}
{{--                </div>--}}
{{--            </div>--}}

            <div>

                <form action="{{ route('manga.destroy', $manga) }}" method="post">
                    @csrf @method('delete')

                    <div class="row mt-4">
                        <div class="col-md-6 float-left">
                            <a href="{{ route('manga.edit', $manga) }}" class="btn create-button">{{ __('EDIT') }}</a>
                        </div>

                        <div class="col-md-6 float-left">
                            <button class="btn create-button">
                                DELETE
                            </button>
                        </div>
                    </div>

                </form>
            </div>


            <div class="row mt-4">
                <div class="col-md-12">
                    <a href="{{ route('chapter.index', ['manga' => $manga]) }}" class="btn create-button">Go to chapters</a>
                </div>
            </div>

        </div>
    </div>
</div>
</x-layouts.navbar>
