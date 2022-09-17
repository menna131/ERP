<?php

namespace Stocks\Http\Controllers\sales;

use Clients\Models\Client;
use Stocks\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stocks\Http\Requests\StoreSaleRequest;

class SaleController extends Controller
{

    public function index()
    {
        return view('stocks::sales.index');
    }


    public function create(Request $request)
    {
        // $clients = Client::all();
        $products = Product::all();
        $options = "";
        if($request->expectsJson()){
            $clients = Client::all();
            foreach( $clients AS $client){
                $options .= "<option value='{$client->id}'> {$client->name}</option>";

            }
            return response()->json(['options'=>$options, 'success'=>true ]);

         }else{
            $clients = Client::all();
            return view('stocks::sales.create',compact('clients','products'));
         }
    }



    // public function store(Request $request){
    //     // $request->validate([
    //     //     'data.*.product'=>'required',
    //     //     'data.*.supplier'=>'required',
    //     //     'data.*.price'=>'required',
    //     //     'data.*.quantity'=>'required',
    //     // ]);
    //     // ProductInvoice::insert($request->data);
    //     return response()->json(['success'=>true,'message'=>'Product Created Successfully'],201);
    // }

    function getSuppliersOptions(Request $request)
    {
        $request->validate([
            'data.*.product'=>'required|exists:Product,id'
        ]);

        $suppliers = Product::findorfail($request->product)->suppliers;
        $options = "";

        foreach($suppliers AS $supplier){
            $options .= "<option value='{$supplier->id}'> {$supplier->name}</option>";
        }

        if($options == ""){
            $options .= "<option value=''> No Supplier </option>";
        }

        return response()->json(['options'=>$options, 'success'=>true, 'suppliers'=>$suppliers  ]);
    }

    // public function showReq(StoreSaleRequest $request){
    public function showReq2(Request $request){
        // $oldInputs = session()->getOldInput();
        // dd($oldInputs);
        // dd($request);
        $rules= [
            'client-name'=> 'required | max:1000 | string | min:2',
            'date'=>'date | nullable',
            'data.*.product'=>'required',
            'data.*.supplier'=>'required',
            'data.*.price'=>'required | numeric | min:1',
            'data.*.quantity'=>'required | integer',
            'payment'=>'required | string | Rule::in(["cash", "install"])', // between (cash or install)

        ];
        $message = [
            'client-name.required'=> 'name is required',
            'date.required'=>'date is required',
            'payment.required'=>'payment is required',

        ];
        // dd($message);
        $request->validate($rules);
        // foreach ($request->input('data')  as $index => $value) {
        //     foreach ($value as $key2 => $value2) {
        //         dd($value2);
        //     }
        // }

    }


    public function show($id)
    {
        //
        return view('stocks::sales.show');
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
    public function PreSale()
    {

        return view('stocks::sales.presale-create');
    }


    public function showReq(StoreSaleRequest $request){

        dd($request->all());
        // return view('stocks::sales.create');

    }















}
