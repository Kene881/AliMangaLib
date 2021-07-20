<x-layouts.app :title="__('News')">

    <a class="btn btn-primary" href="{{ route('news.news.create') }}">
        {{__('Add news')}}
    </a>

    @if($news->isEmpty())
        <div class="alert alert-secondary">
            {{__('No news added yet')}}
            {{__('Please, ')}}
            <a class="alert-link" href="{{ route('news.news.create') }}">
                {{__('add one')}}
            </a>
        </div>
    @else

        @foreach($news as $one_news)

            <div class="card card-body my-3 d-flex flex-row align-items-center">

                <div class="me-auto">
                    {{ $one_news->title }}
                </div>

                <form action="{{ route('news.news.destroy', $one_news) }}" method="post">
                    @csrf @method('delete')

                    <div class="btn-group btn-group-sm">
                        <a class="btn btn-primary" href="{{ route('news.news.show', $one_news) }}">
                            {{__('View')}}
                        </a>
                        <a class="btn btn-warning" href="{{ route('news.news.edit', $one_news) }}">
                            {{__('Edit')}}
                        </a>

                        <button class="btn btn-danger">
                            {{__('Delete')}}
                        </button>
                    </div>

                </form>

            </div>

        @endforeach

        {{ $news->links() }}

    @endif

</x-layouts.app>
