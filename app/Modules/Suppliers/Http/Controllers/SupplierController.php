<?php

namespace Suppliers\Http\Controllers;

use Form;
use Illuminate\Http\Request;
use Users\Models\UserWallet;
use Suppliers\Models\Supplier;
use Yajra\Datatables\Datatables;
use App\Http\services\mediaService;
use App\Http\Controllers\Controller;
use App\Http\services\walletService;
use Suppliers\Models\SupplierWallet;
use Illuminate\Support\Facades\Route;
use Users\Models\UserWalletTransaction;
use Suppliers\Http\Requests\storeSupplier;
use Suppliers\Http\Requests\updateSupplier;
use Supplier\Http\services\pricelistService;
use Suppliers\Models\SupplierWalletTransaction;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Suppliers::suppliers.index');
    }

    public function suppllierData()
    {
        // $data = Supplier::all();
        $data = Supplier::latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = "<a class='btn btn-info btn-sm' rel='tooltip' title='" . __('translation.title.Edit Supplier') . "'
                        href='" . route('suppliers.edit', $row->slug) . "'> <i class='material-icons'>edit</i> </a>";
                $btn .= "<a class='btn btn-info btn-sm' rel='tooltip' title='" . __('translation.title.Show Details') . "'
                        href='" . route('suppliers.show', $row->slug) . "'><i class='material-icons'>visibility</i></a>";
                $btn .= "<a class='btn btn-primary btn-sm' rel='tooltip' title='" . __('translation.title.add in price list') . "'
                        href='" . route('suppliers.pricelists.create',$row->slug) . "'><i class='fa fa-plus-circle' aria-hidden='true'></i></a>";
                $btn .= "<a class='delete-button btn btn-danger btn-sm' title='".__('translation.title.Delete Supplier')."'  href='javascript:void(0)' data='$row->slug'><i class='material-icons'>close</i></a>";
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Suppliers::suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeSupplier $request, walletService $walletService)
    {
        $data = requestAbstractionWithMedia($request);
        $supplier = Supplier::create($data);

        if ($request->hasFile('media')) {
            $supplier->insertMulitMedia($request->file('media'), 'pricelists');
        }
        // create wallet for supplier
        $wallet = $walletService->createWallet(new SupplierWallet, $supplier->id);

        if($request->expectsJson()){
            // when create supplier from purchase module
            return response()->json(['success'=>'true','message'=> 'Supplier Has Been saved Successfully'],201);

        }else{

            return redirectAccordingToRequest($request);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        return view('Suppliers::suppliers.show', compact('supplier'));
    }

// function to get basic information



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('Suppliers::suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Supplier $supplier, updateSupplier $request)
    {
        $data = requestAbstractionWithMedia($request);
        $supplier->update($data);
        if ($request->hasFile('media')) {
            $supplier->insertMulitMedia($request->file('media'), 'pricelists');
        }

        // I didnt use --> redirectAccordingToRequest($request);
        // suppliers.show not index


        if($request->input('redirect') == 'table')
        return redirect()->route('suppliers.show',$supplier->slug)->with('Success',__("translation.Messages.Success.Operation Successfully"));
        elseif($request->input('redirect') == 'back')
        return redirect()->back()->with('Success',__("translation.Messages.Success.Operation Successfully"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier, Request $request)
    {
        $supplier->deleteMultiMedia('pricelists')->delete();
        return redirectAccordingToRequest($request);
    }


}
