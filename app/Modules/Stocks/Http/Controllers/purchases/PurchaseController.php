<?php

namespace Stocks\Http\Controllers\purchases;

use Stocks\Models\Product;
use Illuminate\Http\Request;
use Suppliers\Models\Supplier;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('stocks::purchases.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    //     return view('stocks::purchases.create');
    // }

    public function create(Request $request)
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        $options = "";
        if($request->expectsJson()){
            foreach($suppliers AS $supplier){
                $options .= "<option value='{$supplier->id}'> {$supplier->name}</option>";
            }
            return response()->json(['options'=>$options, 'success'=>true ]);

         }else{
            return view('stocks::purchases.create',compact('suppliers','products'));
         }
    }





    public function store(Request $request)
    {
        //
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
        return view('stocks::purchases.edit');
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
