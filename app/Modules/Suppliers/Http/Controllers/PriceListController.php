<?php

namespace Suppliers\Http\Controllers;

use Illuminate\Http\Request;
use Suppliers\Models\Supplier;
use Suppliers\Models\PriceList;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PriceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Suppliers::priceLists.index');
    }
    public function priceListData($supplier_id)
    {

        $supplier_slug = Supplier::find($supplier_id)->slug;
            $data = PriceList::where('supplier_id',$supplier_id)->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row) use ($supplier_slug) {
                        $btn = "<a class='btn btn-info btn-sm' rel='tooltip' title='".__('translation.title.Edit Price List')."'
                        href='".route('suppliers.pricelists.edit',['supplier'=>$supplier_slug , 'pricelist'=>$row->slug ])."'> <i class='material-icons'>edit</i> </a>";
                        $btn .="<a class='delete-button btn btn-danger btn-sm' rel='tooltip' title='".__('translation.title.Delete Price List')."'  href='javascript:void(0)' data='$row->slug'><i class='material-icons'>close</i></a>";
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
    }

    public function create(Supplier $supplier)
    {
        return view('Suppliers::priceLists.create',compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request,Supplier $supplier)
    {
        $data = requestAbstractionWithMedia($request);
        foreach($data['pricelist'] as $pricelist){
            Pricelist::create($pricelist);
        }

        if ($request->hasFile('media')) {
            $supplier->insertMulitMedia($request->file('media'), 'pricelists');
        }
        if($request->input('redirect') == 'table')
            return redirect()->route('suppliers.show',$supplier->slug)->with('Success',__("translation.Messages.Success.Operation Successfully"));
        elseif($request->input('redirect') == 'back')
            return redirect()->back()->with('Success',__("translation.Messages.Success.Operation Successfully"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
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

    public function edit(Supplier $supplier,PriceList $pricelist)
    {
        return view('Suppliers::priceLists.edit',compact('supplier','pricelist'));
    }

    public function update(Supplier $supplier,PriceList $pricelist,Request $request)
    {
        $data = requestAbstraction($request);
        $pricelist->update($data);
        if($request->input('redirect') == 'table')
            return redirect()->route('suppliers.show',$pricelist->supplier->slug)->with('Success',__("translation.Messages.Success.Operation Successfully"));
        elseif($request->input('redirect') == 'back')
            return redirect()->back()->with('Success',__("translation.Messages.Success.Operation Successfully"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier,PriceList $pricelist,Request $request)
    {

        $pricelist->delete();
        return redirectAccordingToRequest($request);
    }
}
