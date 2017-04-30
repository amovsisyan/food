@extends('layouts.app')


@section('content')
    <section class="populars">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    @foreach($navbar_items as $key => $items)
                        @foreach($items as $key_i => $item)
                            <ul>
                                @if($key_i != "params")
                                    <a href="/{{ $key }}"> {{$item}}</a>
                                @else
                                    @foreach($item as $k => $v)
                                        @foreach($v as $k_new => $v_new)

                                            @if($k_new != "params")
                                                <li>
                                                    <a href="/{{$key}}/{{ $k_new }}"> {{$v_new}}</a>
                                                </li>
                                            @else
                                                <ul>
                                                    @foreach($v_new as $a => $b)

                                                        <li>
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

                <div class="col-md-10 current_cat">
                    @foreach($cocktails as $cocktail)
                        <div class="col-md-12">
                            <div class="cur-populars">
                                <div class="col-md-4 desc_img">
                                    <img src="/img/all/cocktail/{{$path_alias}}/{{$cocktail->avatar}}" alt=""/>
                                </div>
                                <div class="col-md-8 descipt">
                                    <div class="top_descript">
                                        <h2>
                                            <a href="{{ url('/cocktail/'.$path_alias."/".$cocktail->alias) }}">
                                                {{$cocktail->name}}
                                            </a>
                                        </h2>
                                        <div class="time_recept">
                                            <p>Receipt by: {{$cocktail->recept_by}}</p>
                                            <p>Cook time: {{$cocktail->cook_time}}</p>
                                        </div>
                                    </div>
                                    <div class="bot_descript">
                                        {{$cocktail->all_text}}</br>
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