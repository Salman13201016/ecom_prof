<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CatModel;
use App\Models\SubCatModel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cat_model = new CatModel();
        $cat_data = $cat_model->get();
        $sub_cat_model = new SubCatModel();
        $sub_cat_data = $sub_cat_model->get();

        return view('admin.product',compact('cat_data','sub_cat_data'));
    }

    public function cat_ajax($id)
    {
        //
        $all_data = SubCatModel::join('categories', 'categories.id', '=', 'subcats.cat_id')
        ->select('subcats.*', 'categories.cat_name')->where('cat_id',$id)
        ->get();
        return response()->json($all_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $cat_id = $request->input('cat_id');
        $sub_cat_id = $request->input('sub_cat_id');
        $prod_name = $request->input('prod_name');
        $weight = $request->input('weight');
        $price = $request->input('price');
        $img = $request->input('prod_image');
        echo $weight;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
