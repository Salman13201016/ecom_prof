<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatModel;

class CatController extends Controller
{
    //
    
    function createCat(Request $req){
        // $cat_name = $req->add_cat;
        // $hello = "Hello World";
        return redirect('/show');
    }

    function insert(Request $req){
        $cat_name = $req->cat_name;
        $cat_model = new CatModel();
        $cat_model->cat_name = $cat_name;
        $cat_model->save();

        return redirect('/show');
    }

    function show(Request $req){
        // $cat_name = $req->add_cat;
        // $hello = "Hello World";
        $cat_model = new CatModel();
        $cat_data = $cat_model->get();
        
        return view('admin.cat',["cat_data"=>$cat_data]);
    }

    function edit($id){
        $cat_model = new CatModel();
        $cat_data = $cat_model->where('id',$id)->get();
        // dd($cat_data[0]['cat_name']);
        return view('admin.cat_edit',["cat_data"=>$cat_data]);
    }

    function update(Request $req){
        $cat_id = $req->cat_id;
        $cat_name = $req->cat_name;
        $cat_model = CatModel::find($cat_id);
        $cat_model->cat_name = $cat_name; 
        $cat_model->save();
        // dd($cat_data[0]['cat_name']);
        return redirect('/show');
    }
    function delete($id){
        $cat_model = CatModel::where('id',$id)->delete();
        return redirect('/show');
    }
}
