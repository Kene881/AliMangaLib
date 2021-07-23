<x-layouts.navbar :title="__('News')">

    <div class="container-fluid">
        <div class="row news-start-container d-flex justify-content-start">

            <div class="col-md-10">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-auto">
                        <div style="height: 30px;width: 30px;">
                            <img class="rounded float-left fullWHImage" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMS6m2Iz5lXmol7S20vFcLVNc2IZUhBSAX3Q&usqp=CAU"  alt="...">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <h3>News</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="width: 35.5%;">
            <div class="row mt-4">
                <div class="col-md-12">
                    <a class="cancel-button btn" href="{{ route('news.news.create') }}">{{ __('Create') }}</a>
                </div>
            </div>
        </div>
        {{--News and icon--}}

        @if(!$news->isEmpty())
            @foreach($news as $one_news)

                <div class="row news-header-container d-flex justify-content-center mb-2">
                    <div class="col-md-4 p-3 news-post">
                        <div class="row news-post-sub-info p-1">

                            <div class="col-md-2">
                                <span> {{$one_news->created_at->format('d/m/Y')}} </span>
                            </div>

                        </div>

                        <div class="row mt-2" style="letter-spacing: 2px;">
                            <a href="{{ route('news.news.show', $one_news) }}" class="h5">{{$one_news->title}}</a>
                        </div>
                    </div>
                </div>
                {{--Post in news--}}
        @endforeach

        {{ $news->links() }}

        @endif
    </div>


</x-layouts.navbar>

