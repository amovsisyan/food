@extends('layouts.app')


@section('content')
<section class="populars">
		<div class="container-fluid">
                    <div class="row">

                        <div class="col-md-2">
                            @foreach($navbar_items as $key => $items)
                                @foreach($items as $key_i => $item)
                                    <ul>
                                        @if($key_i != "params" && $key_i != "cocktail")
                                            <a href="/{{ $key_i }}"> {{$item}}</a>

                                        @elseif($key_i != "params" && $key_i == "cocktail")
                                            <span>{{$item}}</span>
                                        @else
                                            @foreach($item as $k => $v)
                                                <li>
                                                    <a href="/{{ $key }}/{{ $k }}">{{$v}}</a>
                                                </li>
                                            @endforeach
                                        @endif

                                    </ul>
                                @endforeach
                            @endforeach
                        </div>

                        <div class="col-md-10">

                            @foreach($cocktails as $cocktail)
                                <div class="col-xs-4">
                                    <div class="most-populars">
                                        <img src="/img/all/cocktail/{{$cocktail->avatar}}" alt=""/>
                                        <div class="text">
                                            <a href="{{ url('/cocktail/'.$cocktail->alias) }}">
                                                {{$cocktail->name}}
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
@endsection