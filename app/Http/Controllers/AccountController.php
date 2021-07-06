<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function displayUsersPage(Request $request)
    {
        return view('users');
    }

    public function displayRolesPage(Request $request)
    {
        return view('roles');
    }

    public function viewRoleList(Request $request)
    {
        $role_list = Role::all();
        return $role_list;
    }

    public function viewUserList(Request $request)
    {
        $user_list = User::all();
        foreach($user_list as $user){
            $user['role'] = User::find($user->id)->roles()->first()->name;
        }
        return $user_list;
    }

    
    public function getRoleItem(Request $request){
        $role = Role::find($request->id);
        return $role;
    }

    public function createRoleItem(Request $request){
        $role = Role::create([
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $request->description
        ]);

        $viewDashboard = Permission::where('slug','Dashboard')->first();
        $expense = Permission::where('slug','Expense')->first();

        $role->permissions()->attach($viewDashboard);
        $role->permissions()->attach($expense);
        return $role;
    }

    public function updateRoleItem(Request $request){
        $role = Role::find($request->id);
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'slug' => $request->description
        ];
        $role->update($data);
        return $role;
    }

    public function deleteRoleItem(Request $request){
        $role = Role::find($request->id) ?? abort(400);
        $role->delete();

        return response()->json('Deleted Role Successfully', 200);
    }


    public function getUserItem(Request $request){
        $user = User::find($request->id);
        $user['role_id'] = User::find($user->id)->roles()->first()->id;
        return $user;
    }

    public function createUserItem(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'),
        ]);
        $role = Role::find($request->role_id);
        $user->roles()->attach($role);
        return $user;
    }

    public function updateUserItem(Request $request){
        $user = User::find($request->id);
        $data = [
            'name' => $request->name,
            'email' => $request->email
        ];
        $user->sync($data);
        return $user;
    }

    public function deleteUserItem(Request $request){
        $user = User::find($request->id) ?? abort(400);
        $user->delete();

        return response()->json('Deleted User Successfully', 200);
    }


    
}
