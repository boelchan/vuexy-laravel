<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function data_list()
    {
        $users = User::select(['id','name','email']);

        return Datatables::of($users)
                ->addColumn('action', function ($user) {
                    return view('user.action', compact('user'));
                })
                ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name', 'id')->all();

        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    public function store(Request $request)
    {
        $request->validate([
            'role_id'  => 'required',
            'name'     => 'required',
            'email'    => 'required|unique:users',
            'password' => 'same:password-confirm',
            'password-confirm' => 'required',
        ]);

        $user = new User;

        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->attachRole($request->role_id);
    
        return redirect()->route('user.index')
                        ->with('success','User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::pluck('display_name', 'id')->all();

        $user = User::select(['id','name','email'])
                        ->addSelect(
                            [
                                'role_id' => RoleUser::select('role_id')->whereColumn('user_id', 'users.id')->limit(1)
                            ]
                        )
                        ->firstWhere('id', $id);

        return view('user.edit', compact('roles', 'user'));
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
        $request->validate([
            'role_id'  => 'required',
            'name'     => 'required',
            'email'    => 'required|unique:users,email,'.$id,
        ]);


        $user = User::select(['id','name','email'])
                        ->addSelect(
                            [
                                'role_id' => RoleUser::select('role_id')->whereColumn('user_id', 'users.id')->limit(1)
                            ]
                        )
                        ->findorFail($id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        $user->detachRole($user->role_id);
        $user->attachRole($request->role_id);

        return redirect()->route('user.index')
                        ->with('success','User updated  successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('user.index')
            ->with('success','User updated  successfully.');

    }
}