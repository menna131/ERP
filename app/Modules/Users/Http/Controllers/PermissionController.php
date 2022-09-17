<?php

namespace Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Users\Models\Role;
use Users\Models\Permission;
use Users\Http\Requests\storePermission;
use Users\Models\User;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    public function __construct()
    {
        //
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('users::permissions.index');
    }
    public function permissionData()
    {
        // $data = Permission::all();
        $data = Permission::latest()->get();

        if(config('app.debug') == true){
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                        $btn = "<a class='btn btn-info btn-sm' rel='tooltip' title='".__('translation.title.Edit Permission')."'
                        href='".route('permissions.edit', $row->slug)."'> <i class='material-icons'>edit</i> </a>";
                        $btn .="<a class='delete-button btn btn-danger btn-sm'  title='".__('translation.title.Delete Permission')."' href='javascript:void(0)' data='$row->slug'><i class='material-icons'>close</i></a>";
                        return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }else{
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users::permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePermission $request, Permission $permission)
    {
        if($request->has('crud')){
            $data= [
                ['name'=>'Create '.ucwords($request->name),'guard_name'=>'web'],
                ['name'=>'Update '.ucwords($request->name),'guard_name'=>'web'],
                ['name'=>'Delete '.ucwords($request->name),'guard_name'=>'web'],
                ['name'=>'Read '.ucwords($request->name),'guard_name'=>'web']
            ];
        }else{
            $data = ['name'=> ucwords($request->name),'guard_name'=>'web'];
        };

        Permission::insert($data);
        return redirectAccordingToRequest($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return view('users::permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        return view('users::permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storePermission $request, Permission $permission)
    {
        $data = requestAbstraction($request);
        $permission->update($data);
        return redirectAccordingToRequest($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete($permission);
        return redirect()->route('permissions.index')->with('Success','Permission Deleted Successfully');
    }
    // public function destroyAll(Request $request)
    // {
    //     $rules = [
    //         'deleted_ids.*'=>'required','integers','exists:permissions,id'
    //     ];
    //     $request->validate($rules);
    //     $deletedIds = explode(',',$request->deleted_ids[0]);
    //     Permission::destroy($deletedIds);
    //     return redirect()->route('permissions.index')->with('Success','Permissions Deleted Successfully');
    // }
}
