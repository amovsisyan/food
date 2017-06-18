@extends('layouts.app')
@section('content')
    <section class="populars">
        <div class="container-fluid">
            <div class="row">
                @include('templates.left-navbar')

                <div class="col s10 current_cat">
                    @foreach($data as $d)
                        <div class="col s12">
                            <div class="cur-populars">
                                <div class="col s4 desc_img">
                                    <img src="/img/products/{{Request::segment(1)}}/{{Request::segment(2)}}/{{$d['products']['avatar']}}" alt=""/>
                                </div>
                                <div class="col s8 descript">
                                    <div class="row">
                                        <div class="col m6 s12 top_descript">
                                            <h2>
                                                <a href="{{ url('/'.Request::segment(1).'/'.Request::segment(2).'/'.$d['products']['alias']) }}">
                                                    {{$d['products']['name']}}
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="col m6 s12 time_recept">
                                            <p class="receipt_by">Receipt by:
                                                <a data-receipt="{{$d['hashtag']['descript']}}" href="{{ url('/hashtag/?hashtag=' . $d['hashtag']['name']) }}">
                                                    #{{$d['products']['recept_by']}}
                                                </a>
                                            </p>
                                            <p>Cook time: {{$d['products']['cook_time']}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 bot_descript">
                                            {{$d['products']['all_text']}}...</br>
                                        </div>
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