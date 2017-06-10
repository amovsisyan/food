@extends('layouts.app')

@section('content')
    <section class="carousel-menu">
        @include('templates.carousel')

    </section>
	<section class="main-slogan">
		<div class="container-fluid">
			<h2>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit
			</h2>
		</div>
	</section>
    <section class="my_welcome-page">
        @foreach($mostpop_s as $key => $populars)
            @if($key === -1)
                <section class="populars welcome-new">
                    <div class="category">
                        <div class="container-fluid">
                            <div class="row">
                                <h1 class="header_name">Լավագույնները</h1>
                                @foreach($populars['products'] as $p)
                                    <div class="col s4">
                                        <div class="most-populars">
                                            <img src="/img/products/{{$p->nav_alias}}/{{$p->cat_alias}}/{{$p->avatar}}" alt=""/>
                                            <div class="text">
                                                <a href="{{ url('/'.$p->nav_alias.'/'.$p->cat_alias."/".$p->alias) }}">
                                                    {{$p->name}}
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
            @else
                <section class="populars welcome-product">
                    <div class="category">
                        <div class="container-fluid">
                            <div class="row">
                                <h1 class="header_name">
                                    <a href="{{ url('/' . $populars['nav_alias']) }}"> {{$populars['nav_name']}}</a>
                                </h1>
                                @foreach($populars['products'] as $p)
                                    <div class="col s4">
                                        <div class="most-populars">
                                            <img src="/img/products/{{$p->nav_alias}}/{{$p->cat_alias}}/{{$p->avatar}}" alt=""/>
                                            <div class="text">
                                                <a href="{{ url('/'.$p->nav_alias.'/'.$p->cat_alias."/".$p->alias) }}">
                                                    {{$p->name}}
                                                </a>
                                            </div>
                                            <div class="animation_msp_1"></div>
                                            <div class="animation_msp_2"></div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="wel_see_more">
                                    <a href="{{ url('/' . $populars['nav_alias']) }}">Տեսնել ավելին <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endforeach
    </section>
@endsection

