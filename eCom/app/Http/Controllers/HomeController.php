<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatModel;
use App\Models\SubCatModel;


class HomeController extends Controller
{
    //
    function home(){
        $cat_model = new CatModel();
        $cat_data = $cat_model->get();
        $data =SubCatModel::with(['category'])->get()->groupBy('cat_id');
        // dd($data);
        // $cat_data = $cat_model->get();
        // dd($cat_data,$data);
        // dd($data);
        
        // dd($data);
        
        // return view('admin.sub_cat');
        return view('home.home',["data"=>$data]);
    }
}
