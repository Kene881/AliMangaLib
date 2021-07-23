<x-layouts.navbar title="{{ __('List Genre') }}">
    <div class="container" style="width: 40%;">
        <div class="row d-flex justify-content-start mt-3 manga-header-info">

            @if($genres->isEmpty())
                <div>
                    {{ __('genres not added yet') }}
                </div>
            @else
                @foreach($genres as $genre)
                    <div class="row m-2 p-1 border border-dark rounded">
                        <div class="col-md-4">
                            {{ $genre->name }}
                        </div>
                        <div class="col-md-8">
                            <form action="{{ route('genre.destroy', $genre) }}" method="post">
                                @csrf @method('delete')

                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="{{ route('genre.edit', $genre) }}" class="btn btn-success">{{ __('EDIT') }}</a>
                                    </div>

                                    <div class="col-md-6">
                                        <button class="btn btn-danger">
                                            {{ __('DELETE') }}
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                @endforeach
            @endif

            <div class="row justify-content-end">
                <div class="col-md-5">
                    <a class="btn create-button" href="{{ route('genre.create') }}">{{ __('Add new genre') }}</a>
                </div>
            </div>
        </div>

    </div>

</x-layouts.navbar>
