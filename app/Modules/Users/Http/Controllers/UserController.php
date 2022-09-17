<?php

namespace Users\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\UpdateUserEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Users\Models\Role;
use Users\Http\Requests\passwordUser;
use Users\Http\Requests\profileUser;
use Users\Http\Requests\storeUser;
use Users\Http\Requests\updateEmail;
use Users\Http\Requests\updateUser;
use Users\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users::users.index');
    }

    public function userData()
    {
        // $data = User::all();
        $data = User::latest()->get();

        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('role',function ($row){
                    if($row->roles->isEmpty())
                        return 'no role selected';
                    else
                        return $row->roles->first()->name;
                })
                ->addColumn('action', function($row) {
                    $btn = "<a class='btn btn-info btn-sm' rel='tooltip' title='".__('translation.title.Edit User')."'
                    href='".route('users.edit', $row->slug)."'> <i class='material-icons'>edit</i> </a>";
                    $btn .= "<a class='btn btn-info btn-sm' rel='tooltip' title='". __('translation.title.Show Details')."'
                    href='".route('users.show', $row->slug)."'><i class='material-icons'>visibility</i></a>";
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
        $roles = Role::get();
        return view('users::users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUser $request)
    {
        $data = requestAbstraction($request);
        $data['password'] = Hash::make($data['password']);
        if(User::all()){
            $data['status']=0;
        }
        $user = User::create($data);
        $user->assignRole($request->role);
        return redirectAccordingToRequest($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(User $user)
    {
        $roles = $user->getRoleNames()[0];
        return view('users::users.show', compact('user', 'roles'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $allRoles = Role::get();
        $role = $user->getRoleNames()[0];
        return view('users::users.edit', compact('user', 'role', 'allRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateUser $request, User $user)
    {

        // dd($request);
        $data = requestAbstraction($request);
        // dd($data);

        $user->update($data);
        $user->syncRoles($request->role);
        return redirectAccordingToRequest($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user,Request $request)
    {
        $user->roles()->detach();
        $user->delete($user);
        return redirectAccordingToRequest($request);
    }

       /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function profileEdit(User $user)
    {
        $allRoles = Role::get();
        return view('users::users.profile.edit', compact('user', 'allRoles'));
    }


    /* Update the profile
    *
    * @param  \App\Http\Requests\ProfileRequest  $request
    * @return \Illuminate\Http\RedirectResponse
    */
    public function profileUpdate(profileUser $request, User $user)
    {
        $user->update($request->all());
        return back()->withStatus(__('translation.users.Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profileEmail(updateEmail $request, User $user)
    {
        $emailllll = $request->email;
        $errors['email'] = __('translation.users.this email is the same the old email');
        if($request->email == $user->email){
            return view('users::users.profile.edit', compact('user', 'allRoles','errors'));
        }
        $link_all = URL::temporarySignedRoute('link.update.user.email',now()->addMinute(30), ['slug' => auth()->user()->slug, 'email'=> $request->email]);
        $details = [
            'title' => 'hiiiii',
            'body' => 'bla bla bla',
            'link' => $link_all,
        ];
        Mail::to($emailllll)->send(new UpdateUserEmail($details));
        return redirect()->route('profile.edit', $user->slug)->with('message', __('translation.users.Before proceeding, please check your email for a verification link'));
    }
    public function linkToUpdateUserEmail(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }else{
            User::where('slug', $request->slug)->update(['email'=> $request->email]);
            return redirect()->route('profile.edit', $request->slug);
        }
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profilePassword(passwordUser $request, User $user)
    {
        $user->update(['password' => Hash::make($request->get('password'))]);
        return back()->withStatusPassword(__('translation.users.Password successfully updated.'));
    }
}
