<x-layouts.navbar title="{{ __('Main') }}">
    <div class="container" style="width: 70%;">

        <div class="row d-flex justify-content-start mt-3 manga-card-base">
            <div class="row">
                @if($mangas->isEmpty())
                    <div class="card">
                        <img src="{{ \Storage::url('public/forSeeds/ded.png') }}" style="width: 100%; height: 20vw; object-fit: cover;" class="manga-list-image" alt="...">
                        <div class="card-body">
                            <p class="card-text">add manga pls</p>
                        </div>
                    </div>
                @else
                    @foreach($mangas as $manga)
                        <div class="col-md-3">
                            <a href="{{ route('manga.show', $manga) }}">
                                <div class="card">
                                    <img src="{{ \Storage::url($manga->image_path) }}" style="width: 100%; height: 20vw; object-fit: cover;" class="manga-list-image" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">{{ $manga->title }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="row d-flex justify-content-start mt-3 manga-card-base">
            <div class="row mt-4">
                <div class="col-md-12">
                    <h4>Last News</h4>
                </div>
            </div>

            @if($news->isEmpty())
                <div class="row mt-1 mb-4" style="border: solid #f2f2f3 2px">
                    <div class="col-md-12">
                        <p>no news</p>
                        <span class="news-post-sub-info">(╯°□°）╯︵ ┻━┻ "ヽ('▽｀)ノ" (`･ω･´)</span>
                    </div>
                </div>
            @endif

            @foreach($news as $one_news)
                <div class="row mt-1 mb-4" style="border: solid #f2f2f3 2px">
                    <div class="col-md-12">
                        <p>{{ $one_news->title }}</p>
                        <span class="news-post-sub-info">{{ $one_news->created_at }}</span>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-layouts.navbar>


