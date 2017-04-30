@extends('layouts.app')

@section('content')

    <section class="carousel-menu">
        <div class="carousel carousel-slider center my_carousel-slider" data-indicators="true">
            <div class="carousel-fixed-item center">
                <a class="btn waves-effect white grey-text darken-text-2 carousel-button">See More</a>
            </div>
            @foreach($slides as $slide)
                <div class="carousel-item white-text" href="">
                    <img src="/img/carousel/{{$slide->avatar}}" alt="...">
                    <div class="my_carousel-inner-text">
                        <h2 data-href="{{url( $slide->more_inf)}}" >{{ $slide->header_inf }}</h2>
                        <p>{{ $slide->body_inf }}</p>
                    </div>
                 </div>
            @endforeach
        </div>
    </section>
	<section class="main-slogan">
		<div class="container-fluid">
			<h2>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit
			</h2>
		</div>
	</section>
    <section class="populars welcome-new">
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="header_name">Լավագույնները</h1>
                    @foreach($mostpop_s as $m)
                        <div class="col-xs-4">
                            <div class="most-populars">
                                <img src="/img/all/{{$m->nav_alias}}/{{$m->cat_alias}}/{{$m->avatar}}" alt=""/>
                                <div class="text">
                                    <a href="{{ url('/'.$m->nav_alias.'/'.$m->cat_alias."/".$m->alias) }}">
                                        {{$m->name}}
                                    </a>
                                </div>
                                <div class="animation_msp_1"></div>
                                <div class="animation_msp_2"></div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
	</section>

    <section class="populars welcome-food">
        <div class="category">
            <div class="container-fluid">
            <div class="row">
                <h1 class="header_name">
                    <a href="{{ url('/food') }}">Սնունդ</a>
                </h1>
                @foreach($most_foods as $f)
                    <div class="col-xs-4">
                        <div class="most-populars">
                            <img src="/img/all/{{$f->nav_alias}}/{{$f->cat_alias}}/{{$f->avatar}}" alt=""/>
                            <div class="text">
                                <a href="{{ url('/'.$f->nav_alias.'/'.$f->cat_alias."/".$f->alias) }}">
                                    {{$f->name}}
                                </a>
                            </div>
                            <div class="animation_msp_1"></div>
                            <div class="animation_msp_2"></div>
                        </div>
                    </div>
                @endforeach
                <div class="wel_see_more"><a href="{{ url('/food') }}">Տեսնել ավելին <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </a></div>
            </div>
            </div>
        </div>
    </section>
    <section class="populars welcome-drink">
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="header_name">
                        <a href="{{ url('/cocktail') }}">Խմիչք</a>
                    </h1>
                    @foreach($most_cocktails as $c)
                        <div class="col-xs-4">
                            <div class="most-populars">
                                <img src="/img/all/{{$c->nav_alias}}/{{$c->cat_alias}}/{{$c->avatar}}" alt=""/>
                                <div class="text">
                                    <a href="{{ url('/'.$c->nav_alias.'/'.$c->cat_alias."/".$c->alias) }}">
                                        {{$c->name}}
                                    </a>
                                </div>
                                <div class="animation_msp_1"></div>
                                <div class="animation_msp_2"></div>
                            </div>
                        </div>
                    @endforeach
                     <div class="wel_see_more"><a href="{{ url('/cocktail') }}">Տեսնել ավելին <i class="fa fa-arrow-right" aria-hidden="true"></i>
                         </a></div>
                </div>
            </div>
        </div>
	</section>

@endsection

