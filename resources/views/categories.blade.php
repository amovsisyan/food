@extends('layouts.app')
@section('content')
    <section class="populars">
        <div class="container-fluid">
            <div class="row">
                <div class="col s2 my_left-navbar">
                    @foreach($navbar_items as $key => $items)
                        @foreach($items as $key_i => $item)
                            <ul>
                                @if($key_i != "params" && $key_i != Request::segment(2))
                                    <span class="left-nav-category">
                                        <a href="/{{ $key_i }}"> {{$item}}</a>
                                    </span>
                                @elseif($key_i != "params" && $key_i == Request::segment(2))
                                    <span class="left-nav-category">{{$item}}</span>
                                @else
                                    @foreach($item as $k => $v)
                                        <li class="left-nav-category-items">
                                            <a href="/{{ $key }}/{{ $k }}">{{$v}}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        @endforeach
                    @endforeach
                </div>
                <div class="col s10">
                    @foreach($data as $d)
                        <div class="col s4">
                            <div class="most-populars">
                                <img src="/img/products/{{Request::segment(1)}}/{{$d->avatar}}" alt=""/>
                                <div class="text">
                                    <a href="{{ url('/'. Request::segment(1) .'/'.$d->alias) }}">
                                        {{$d->name}}
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