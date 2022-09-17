<?php

namespace App\Http\Controllers\backend\brands;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\services\mediaService;
use Illuminate\Support\Facades\Route;
use Yajra\Datatables\Datatables;
use App\Http\Requests\storeBrand;

class BrandController extends Controller
{


    public function index()
    {
        return view('backend.brands.index');
    }

    public function brandData()
    {
        // $data = $clientwallet->ClientWalletTransactions;

        // $data = Brand::all();
        $data = Brand::latest()->get();

        return Datatables::of($data)
                ->addIndexColumn()  // index 1,2,3,4,5,....
                // action column
                ->addColumn('action', function($row) {
                    $btn = "<a class='btn btn-info btn-sm' rel='tooltip' title='".__('translation.website.crud.update') ."'
                    href='".route('brands.edit', $row->slug)."'> <i class='material-icons'>edit</i> </a>";
                    $btn .="<a class='delete-button btn btn-danger btn-sm' title='".__('translation.categories.Delete Category') ."' href='javascript:void(0)' data='$row->slug'><i class='material-icons'>close</i></a>";
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }


    public function create()
    {
        return view('backend.brands.create');
    }


    public function store(storeBrand $request)
    {
        $data = requestAbstractionWithMedia($request);
        $brand = Brand::create($data);
        if ($request->hasFile('media')) {
            $brand->insertSingleMedia($request->file('media'), 'brands');
        }
        return redirectAccordingToRequest($request);
    }


    public function show($id)
    {
        //
    }

    public function edit(Brand $brand)
    {
        return view('backend.brands.edit',compact('brand'));
    }

    public function update(storeBrand $request,Brand $brand)
    {
        $data = requestAbstractionWithMedia($request);
        // dd($data);
        $brand ->update($data);
        if ($request->hasFile('media')) {


            $media =$brand->medias->first();
            // dd($media);
            if($media){
                $brand->deleteSingleMedia('brands',$media->id);
            }

            $brand->insertSingleMedia($request->file('media'), 'brands');
        }
        return redirectAccordingToRequest($request);
    }


    public function destroy(Brand $brand ,Request $request)
    {
        $brand->deleteMultiMedia('brands')->delete();
        return redirectAccordingToRequest($request);
    }
}
