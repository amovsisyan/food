<?php

namespace App\Http\Controllers;
use App\Carousel;
use App\Navbar;
use App\Product;
use Illuminate\Http\Request;
use App\Category;

class HomeController extends Controller
{
    public $navbars;
    const MOST_POP_IN_ALL_PAGE_STATUS = -1;

    public function __construct(){
        $this->navbars = Navbar::all();     
    }

    public function index()
    {
        $carousels = Carousel::all();

        $navbar_fields = [];

        foreach ($this->navbars as $navbar) {
            $navbar_fields['id'][] = $navbar['id'];
            $navbar_fields['alias'][] = $navbar['alias'];
        };

        $navbar_fields['id'][] = self::MOST_POP_IN_ALL_PAGE_STATUS;

        $mostpop_s = Product::select('products.status', 'products.avatar', 'products.alias', 'products.name', 'categories.alias as cat_alias','navbars.alias as nav_alias', 'navbars.name as nav_name')
            ->wherein('status', $navbar_fields['id'])
            ->leftJoin('categories', function ($join) {
            $join->on('categories.id', '=', 'products.categ_id');
            })
            ->leftJoin('navbars', function ($join) {
            $join->on('categories.main_category_id', '=', 'navbars.id');
            })
            ->get();

        $data = [];
        foreach ($mostpop_s as $key => $mostpopular) {
            $status = $mostpopular['status'];
            $data[$mostpopular['status']]['products'][] = $mostpopular;
            if (empty($data[$mostpopular['status']]['nav_alias']) && $status !== self::MOST_POP_IN_ALL_PAGE_STATUS) {
                $data[$mostpopular['status']]['nav_alias'] = $mostpopular['nav_alias'];
                $data[$mostpopular['status']]['nav_name'] = $mostpopular['nav_name'];
            }
        }
        $response = [
            'navbars'       => $this->navbars,
            'carousels'        => $carousels,
            'mostpop_s'     => $data,
        ];
        return response()
            -> view('welcome', $response);
    }

    public function leftnavbar()
    {
        $data = Category::select( 'categories.name as cat_name', 'navbars.name as nav_name',
            'categories.alias as cat_alias','navbars.alias as nav_alias' )
            ->leftJoin('navbars', function ($join) {
                $join->on('navbars.id', '=', 'categories.main_category_id');
            })->get();
        $arr_data = [];

        foreach ($data as $d){
            $arr_data [$d->nav_alias][$d->nav_alias] = $d->nav_name;
            $arr_data [$d->nav_alias]['params'][$d->cat_alias] = $d ->cat_name;
        }
        return $arr_data;
        //SELECT categories.name as cat_name, navbars.name as nav_name
        // FROM `categories`
        // left JOIN navbars on navbars.id = categories.main_category_id
    }

    public function leftnavbar_prod_cur($type=null)
    {
        /*
         SELECT categories.id as cat_id, categories.name as cat_name, navbars.name as nav_name,foods.name as food_name
         FROM `categories`
         left JOIN navbars on navbars.id = categories.main_category_id
         left JOIN foods on categories.id = foods.categ_id
        */
        $data = Category::select('categories.id as cat_id','categories.name as cat_name', 'navbars.name as nav_name','products.name as prod_name',
            'categories.alias as cat_alias','navbars.alias as nav_alias','products.alias as p_alias')
            ->leftJoin('navbars', function ($join) {
                $join->on('navbars.id', '=', 'categories.main_category_id');
            })->leftJoin('products', function ($join) use($type) {
                $join->on('categories.id', '=', 'products.categ_id')
                     ->where ('categories.alias',$type);
            })->get();

        $arr_data = [];
        foreach ($data as $d){
            if(!empty($d ->prod_name)){
                $arr_data [$d->nav_alias][$d ->nav_alias] = $d ->nav_name;
                $arr_data [$d->nav_alias]['params'] [$d ->cat_alias][$d ->cat_alias] = $d->cat_name;
                $arr_data [$d->nav_alias]['params'] [$d ->cat_alias]['params'][$d ->p_alias] = $d ->prod_name;
            }else{
                $arr_data [$d->nav_alias][$d ->nav_alias] = $d ->nav_name;
                $arr_data [$d->nav_alias]['params'] [$d ->cat_alias][$d ->cat_alias] = $d ->cat_name;
            }
        }
        return $arr_data;
    }
}
