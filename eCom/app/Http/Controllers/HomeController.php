<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatModel;
use App\Models\SubCatModel;
use App\Models\ProductModel;


class HomeController extends Controller
{
    //
    function home(){
        $cat_model = new CatModel();
        $cat_data = $cat_model->get();
        $data =SubCatModel::with(['category'])->get()->groupBy('cat_id');
        $latest_product = new ProductModel();
        $latest_prod_data = $latest_product->latest()->take(4)->get();
        // dd($prod_data);

        // dd($data);
        // $cat_data = $cat_model->get();
        // dd($cat_data,$data);
        // dd($data);
        
        // dd($data);
        
        // return view('admin.sub_cat');
        return view('home.home',compact('data','latest_prod_data'));
    }
}
