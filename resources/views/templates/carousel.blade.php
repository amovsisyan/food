<div class="carousel carousel-slider center my_carousel-slider" data-indicators="true">
    <div class="carousel-fixed-item center">
        <a class="btn waves-effect white grey-text darken-text-2 carousel-button">See More</a>
    </div>
    @foreach($carousels as $carousel)
        <div class="carousel-item white-text" href="">
            <img src="/img/carousel/{{$carousel->avatar}}" alt="...">
            <div class="my_carousel-inner-text">
                <h2 data-href="{{url( $carousel->more_inf)}}" >{{ $carousel->header_inf }}</h2>
                <p>{{ $carousel->body_inf }}</p>
            </div>
        </div>
    @endforeach
</div>