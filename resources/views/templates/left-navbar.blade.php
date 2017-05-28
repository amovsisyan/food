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