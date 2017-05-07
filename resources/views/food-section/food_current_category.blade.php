@extends('layouts.app')

@section('content')
<section class="populars">
		<div class="container-fluid">
            <div class="row">
                <div class="col s2 my_left-navbar">
                    @foreach($navbar_items as $key => $items)
                        @foreach($items as $key_i => $item)
                            <ul>
                                @if($key_i != "params")
                                    <span class="left-nav-category">
                                        <a href="/{{ $key }}"> {{$item}}</a>
                                    </span>
                                @else
                                    @foreach($item as $k => $v)
                                        @foreach($v as $k_new => $v_new)
                                            @if($k_new != "params")
                                                <li class="left-nav-category-items">
                                                    <a href="/{{$key}}/{{ $k_new }}"> {{$v_new}}</a>
                                                </li>
                                            @else
                                                <ul>
                                                    @foreach($v_new as $a => $b)
                                                        <li class="left-nav-category-items-i">
                                                            <a href="/{{ $key }}/{{ $k }}/{{ $a }}">{{$b}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                             @endif
                                        @endforeach
                                    @endforeach
                                @endif
                            </ul>
                        @endforeach
                    @endforeach
                </div>

                <div class="col s10 current_cat">
                    @foreach($foods as $food)
                        <div class="col m12">
                            <div class="cur-populars">
                                <div class="col m4 desc_img">
                                        <img src="/img/all/food/{{$path_alias}}/{{$food->avatar}}" alt=""/>
                                </div>
                                <div class="col m8 descript">
                                    <div class="top_descript">
                                        <h2>
                                            <a href="{{ url('/food/'.$path_alias."/".$food->alias) }}">
                                                {{$food->name}}
                                            </a>
                                        </h2>
                                        <div class="time_recept">
                                            <p>Receipt by: {{$food->recept_by}}</p>
                                            <p>Cook time: {{$food->cook_time}}</p>
                                        </div>
                                    </div>
                                    <div class="bot_descript">
                                        {{$food->all_text}}</br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</section>
@endsection