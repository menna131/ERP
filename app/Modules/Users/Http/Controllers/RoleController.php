<?php

namespace Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Users\Http\Requests\storeRole;
use Users\Models\Role;
use Users\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
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
    public function index(Request $requset)
    {
        return view('users::roles.index');
    }
    public function roleData()
    {
        // $data = Role::all();
        $data = Role::latest()->get();

        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = "<a class='btn btn-info btn-sm' rel='tooltip' title='".__('translation.title.Edit User')."'
                    href='".route('roles.edit', $row->slug)."'> <i class='material-icons'>edit</i> </a>";
                    $btn .= "<a class='btn btn-info btn-sm' rel='tooltip' title='". __('translation.title.Show Details')."'
                    href='".route('roles.show', $row->slug)."'><i class='material-icons'>visibility</i></a>";
                    $btn .="<a class='delete-button btn btn-danger btn-sm'  href='javascript:void(0)' data='$row->slug'><i class='material-icons'>close</i></a>";
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
        // $guards = array_keys(config('auth.guards'));

        // $permissions = Permission::all();
        $permissions = Permission::latest()->get();
        return view('users::roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRole $request)
    {

        $data = requestAbstraction($request);
        $role = Role::create($data);
        $role->givePermissionTo($data['permission_id']);
        return redirectAccordingToRequest($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $permissions = $role->getAllPermissions();
        return view('users::roles.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = $role->getAllPermissions();
        $allPermissions = Permission::get();
        return view('users::roles.edit', compact('role', 'permissions', 'allPermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // return $request;
        $rules = [
            'name'=>['required','string'],
            'guard_name'=>['nullable']
        ];
        $data = requestAbstraction($request);
        $role->update($data);
        $role->syncPermissions($request->permission_id);
        return redirectAccordingToRequest($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete($role);
        return redirect()->route('roles.index')->with('Success','Role Deleted Successfully');
    }
}
