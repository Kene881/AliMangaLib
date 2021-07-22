<x-layouts.navbar title="{{ __('show manga') }}">
<div class="container" style="width: 60%;">

    <div class="row d-flex justify-content-start mt-3 manga-header-info">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <img style="width: 100%; height: 25vw;" src="{{ \Storage::url($manga->image_path) }}">
                </div>

                <div class="col-md-8">
                    <div class="card m-1">
                        <div class="card-footer">
                            <div class="row border rounded border-dark m-1 p-1">
                                <div class="col-md-3">
                                    <p class="text-muted">Title</p>
                                </div>
                                <div class="col-md-9">
                                    <p class="card-text">{{ $manga->title }}</p>
                                </div>
                            </div>

                            <div class="row border rounded border-dark m-1 p-1">
                                <div class="col-md-3">
                                    <p class="text-muted">Genre</p>
                                </div>
                                <div class="col-md-9">
                                    <p class="card-text">{{ $manga->genre->name }}</p>
                                </div>
                            </div>

                            <div class="row border rounded border-dark m-1 p-1">
                                <div class="col-md-3">
                                    <p class="text-muted">Description</p>
                                </div>
                                <div class="col-md-9">
                                    <p class="card-text">{{ $manga->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


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
