<?php

namespace App\Http\Controllers;

use App\Hashtag;
use Illuminate\Http\Request;

class HashtagController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function hashtag(Request $request)
    {
        $left_nav = parent::leftnavbar_prod_cur();
        $niddle = $request['hashtag'];
        $hashtag = Hashtag::where('hashtag', $niddle)->first();
        $products = $hashtag->products()->get();

        $data_obj['products'] = $products;
        $data_obj['hashtag'] = $hashtag;
        $data = array(
            'navbars'       => $this->navbars,
            'data'           => $data_obj,
            'navbar_items'  => $left_nav
        );
                dd($data['obj']);

        return response()
            -> view('current_category', $data);
//        dd($data);
    }
}
