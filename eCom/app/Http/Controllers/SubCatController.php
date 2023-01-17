<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatModel;
use App\Models\SubCatModel;
use Illuminate\Support\Facades\DB;

class SubCatController extends Controller
{
    //
    function showSubCat(Request $req){
        // $cat_name = $req->add_cat;
        // $hello = "Hello World";
        // $cat_model = new CatModel();
        // $cat_data = $cat_model->get();
        $data =SubCatModel::join('categories', 'subcats.cat_id', '=', 'categories.id')
                ->select('subcats.*','categories.cat_name')
                ->get();
        
        // dd($data);
        
        return view('admin.sub_cat',["data"=>$data]);
    }

    function insert(Request $req){
        $cat_id = $req->cat_id;
        $sub_cat_name = $req->sub_cat_name;
        $sub_cat_model = new SubCatModel();
        $sub_cat_model->cat_id = $cat_id;
        $sub_cat_model->sub_cat_name = $sub_cat_name;
        $sub_cat_model->save();

        return redirect('/show_subcat');
    }
}
