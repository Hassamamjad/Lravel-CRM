<?php

namespace App\Http\Controllers;
use App\Models\user;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(){ 
        $roles = Role::all();
        return view('user', compact("roles"));
        
    }

    public function userList(Request $request) 
    {
       $users = User::with('role')->get(); 
       return response()->json([
        'data' => $users

       ],200);

    }

    public function userCreate(Request $request){
      
        $user=User::create([
          'name'=>$request->name,
          'email'=>$request->email,
          'password' => Hash::make($request->password),
          'role_id'=>$request->role,
        ]);
    }
    public function destroy(User $id){
        $id->delete();
}
}