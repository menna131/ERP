<?php

namespace App\Http\Controllers\backend\categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\services\mediaService;
use App\Models\Media;
use Illuminate\Support\Facades\Route;
use Yajra\Datatables\Datatables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.categories.index');
    }
    public function categoryData()
    {
        $data = Category::latest()->get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = "<a class='btn btn-info btn-sm' rel='tooltip' title='".__('translation.categories.Edit Category') ."'
                    href='".route('categories.edit', $row->slug)."'> <i class='material-icons'>edit</i> </a>";
                    $btn .="<a class='delete-button btn btn-danger btn-sm' title='".__('translation.categories.Delete Category') ."' href='javascript:void(0)' data='$row->slug'><i class='material-icons'>close</i></a>";
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
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeCategory $request)
    {
        $data = requestAbstractionWithMedia($request);
        $category = Category::create($data);
        if ($request->hasFile('media')) {
            $category->insertSingleMedia($request->file('media'), 'categories');
        }
        return redirectAccordingToRequest($request);
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
    public function edit(Category $category)
    {
        return view('backend.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeCategory $request,Category $category)
    {
        $data = requestAbstractionWithMedia($request);
        $category ->update($data);
        if ($request->hasFile('media')) {
        $media =$category->medias->first();
        if($media){
            $category->deleteSingleMedia('categories',$media->id);
        }
            $category->insertSingleMedia($request->file('media'), 'categories');}
        return redirectAccordingToRequest($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category ,Request $request)
    {
        $category->deleteMultiMedia('categories')->delete();
        return redirectAccordingToRequest($request);
    }



}
