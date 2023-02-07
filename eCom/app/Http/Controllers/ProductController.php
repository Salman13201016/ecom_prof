<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CatModel;
use App\Models\SubCatModel;
use App\Models\ProductModel;

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
        $prod = new ProductModel();
        $prod_data = $prod->join('categories', 'categories.id', '=', 'products.cat_id')
        ->join('subcats','subcats.id','=','products.sub_cat_id')
        ->select('products.*', 'categories.cat_name','subcats.sub_cat_name')
        ->get();
        // dd($prod_data);
        

        return view('admin.product',compact('cat_data','sub_cat_data','prod_data'));
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

    public function details(){
        return view('home/prod_details');
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
        $prod_desc = $request->input('prod_desc');
        $weight = $request->input('weight');
        $price = $request->input('price');
        $img = $request->file('prod_image')->store('public/images');
        $prod = new ProductModel();
        $prod->cat_id = $cat_id;
        $prod->sub_cat_id = $sub_cat_id;
        $prod->prod_name = $prod_name;
        $prod->prod_desc = $prod_desc;
        $prod->prod_image = $img;
        $prod->prod_weight = $weight;
        $prod->prod_price = $price;

        $prod->save();
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
