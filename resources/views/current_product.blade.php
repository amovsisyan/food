@extends('layouts.app')
@section('content')
    <section class="populars">
        <div class="container-fluid">
            <div class="row">
                @include('templates.left-navbar')

                <div class="col m10 current_cat">
                    <div class="col m12">
                        <div class="current">
                            <div class="col m6 cur_desc_img">
                                <img src="/img/products/{{Request::segment(1)}}/{{Request::segment(2)}}/{{$obj->avatar}}" alt=""/>
                            </div>
                            <div class="col m6 cur_descipt">
                                <div class="top_descript">
                                    <h2>
                                        {{$obj->name}}
                                    </h2>
                                    <div class="cur_time_recept">
                                        <p class="receipt_by">Receipt by:
                                            <a href="{{ url('/hashtag/?hashtag=' . $obj->recept_by) }}">
                                                #{{$obj->recept_by}}
                                            </a>
                                        </p>
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