@extends('layouts.app')


@section('content')
<section class="populars">
		<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2">
                            @foreach($navbar_items as $key => $items)
                                @foreach($items as $key_i => $item)
                                    <ul>
                                        @if($key_i != "params" && $key_i != "food")
                                            <a href="/{{ $key_i }}"> {{$item}}</a>

                                        @elseif($key_i != "params" && $key_i == "food")
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
                                    @foreach($foods as $food)
                                        <div class="col-xs-4">
                                            <div class="most-populars">
                                                <img src="/img/all/food/{{$food->avatar}}" alt=""/>
                                                <div class="text">
                                                    <a href="{{ url('/food/'.$food->alias) }}">
                                                        {{$food->name}}
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