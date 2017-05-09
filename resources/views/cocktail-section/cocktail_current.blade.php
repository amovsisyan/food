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

                <div class="col m10 current_cat">
                    <div class="col m12">
                        <div class="current">
                            <div class="col m6 cur_desc_img">
                                <img src="/img/all/cocktail/{{$path_alias}}/{{$obj->avatar}}" alt=""/>
                            </div>
                            <div class="col m6 cur_descipt">
                                <div class="top_descript">
                                    <h2>
                                        {{$obj->name}}
                                    </h2>
                                    <div class="cur_time_recept">
                                        <p>Receipt by: {{$obj->recept_by}}</p>
                                        <p>Cook time: {{$obj->cook_time}}</p>
                                        <div class="cur_ingredients">
                                            <div class="cur_ingredients_items">Igredients:
                                                @foreach($obj->ingredients as $ing)
                                                    <p>{{$ing}},</p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col m12">
                            <div class="cur_bot_descript">
                                {{$obj->all_text}}</br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection