
<div id="music">
    <div class="container">
        <div class="row">

            @foreach($albums->items as $album)
                    <div class="col-lg-3 col-md-4 col-xs-12 thumb">
                        <a target="_blank" class="thumbnail" href="{{ $album->external_urls->spotify }}">
                            <img class="img-responsive" src="{{ $album->images[0]->url }}" alt="">
                        </a>
                    </div>
            @endforeach

           {{--  <div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-6 col-md-3">
                <div class="track">
                    <img class="img-responsive" src="https://i1.sndcdn.com/artworks-000209400541-nnn9hq-t500x500.jpg">
                    <span class="text-content toggle-track-btn"><span><i data-soundcloud-url="https://soundcloud.com/julianjordan/say-love-x-sj" class="fa fa-play-circle"></i></span></span>
                </div>
            </div> --}}
        </div>
    </div>
</div>
