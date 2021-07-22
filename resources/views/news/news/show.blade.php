<x-layouts.navbar :title="$news->title">

        <div class="container" style="width: 45%;">

            <div class="row d-flex justify-content-start news-card-base mt-3" >
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-auto">
                            <div style="height: 30px;width: 30px;">
                                <img class="rounded float-left fullWHImage" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMS6m2Iz5lXmol7S20vFcLVNc2IZUhBSAX3Q&usqp=CAU"  alt="...">
                            </div>
                        </div>

                        <div class="col-md-5 news-post-sub-info">
                            <span>{{ $news->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                        </div>
                    </div>

                </div>
            </div>

            <div class="row d-flex justify-content-start news-card-base" >
                <div class="col-md-8">
                    <h2>{{ $news->title }}</h2>
                </div>
            </div>

            <div class="row d-flex justify-content-start news-card-base">
                <div class="col-md-8">
                    <span>{{ $news->description }}</span>
                </div>
            </div>
            <form action="{{ route('news.news.destroy', $news) }}" method="post">
                @csrf @method('delete')
                <div class="row mt-4">
                    <div class="col-md-12">
                        <a class="cancel-button btn" href="{{ route('news.news.edit', $news) }}">{{__('Update')}}</a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <button class="cancel-button btn">{{__('Delete')}}</button>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <a class="cancel-button btn" href="{{ route('news.news.index') }}">{{__('Back')}}</a>
                    </div>
                </div>
            </form>
        </div>
        {{--    </div>--}}

</x-layouts.navbar>
