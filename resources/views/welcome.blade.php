@extends('layouts.app')

@section('content')

    <section class="carousel-menu">
		<div id="carousel" class="carousel fade" data-ride="carousel">
				<!-- Indicators -->
				<div class='carousel-indicators-wrap'>
					<ol class="carousel-indicators">
						<li data-target="#carousel" data-slide-to="0" class="active"></li>
						<li data-target="#carousel" data-slide-to="1"></li>
						<li data-target="#carousel" data-slide-to="2"></li>
					</ol>
				</div><!-- Indicators -->
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
                    @foreach($slides as $slide)
                        @if($slide->status == 0)
                        <div class="item active">
                                @else
                            <div class="item">
                                @endif
                                <img src="/img/carousel/{{$slide->avatar}}" alt="...">
                                <div class="bgslide bgslide1"></div>
                                <div class="carousel-caption">
                                    <h1>{{ $slide->header_inf }}</h1>
                                    <h3>{{ $slide->body_inf }}</h3>
                                    <span data-href="{{url( $slide->more_inf)}}" class="btn-red carousel_more">see more <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        @endforeach

					{{--<div class="item active">--}}
						{{--<!--<img src="img/slider.jpg" alt="...">-->--}}
						{{--<div class="bgslide bgslide1"></div>--}}
						{{--<div class="carousel-caption">--}}
							{{--<h1>Women's apparel 1</h1>--}}
							{{--<h3>T-shirt, Dress for 1</h3>--}}
							{{--<a href="#" class="btn-red">Shopping Cart 1</a>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="item">--}}
						{{--<!--<img src="img/slider.jpg" alt="...">-->--}}
						{{--<div class="bgslide bgslide2"></div>--}}
						{{--<div class="carousel-caption">--}}
							{{--<h1>Women's apparel 2</h1>--}}
							{{--<h3>T-shirt, Dress for 2</h3>--}}
							{{--<a href="#" class="btn-red">Shopping Cart 2</a>--}}
						{{--</div>--}}
					{{--</div>--}}
					{{--<div class="item">--}}
						{{--<!--<img src="img/slider.jpg" alt="...">-->--}}
						{{--<div class="bgslide bgslide3"></div>--}}
						{{--<div class="carousel-caption">--}}
							{{--<h1>Women's apparel 3</h1>--}}
							{{--<h3>T-shirt, Dress for 3</h3>--}}
							{{--<a href="#" class="btn-red">Shopping Cart 3</a>--}}
						{{--</div>--}}
					{{--</div>--}}
				    </div>

				<!-- Controls -->
<!--				<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>-->
			    </div>
		</div>
    </section>
	<section class="main-slogan">
		<div class="container-fluid">
			<h1>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit
			</h1>
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

