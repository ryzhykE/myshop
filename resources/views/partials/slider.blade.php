<div class="owl-carousel nav-style4 nav-center-center " data-nav="true" data-dots="false" data-loop="true" data-autoplay="false" data-margin="0" data-responsive='{"0":{"items":1},"600":{"items":2},"1000":{"items":4}}'>

    @foreach($portfolio as $item)
    <div class="banner-text style4">
        <div class="image">
            <a href="#"><img src="{{ $item->image }}" alt=""></a>
        </div>
        <div class="content-text">
            <h4 class="subtitle">{{ $item->name }}</h4>
            <h3 class="title">{{ $item->desc }}</h3>
        </div>
    </div>
    @endforeach

</div>

