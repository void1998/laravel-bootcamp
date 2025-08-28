<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function index()
    {
        $users = User::all();
        return view('users.index',["users"=>$users]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $email = $data['email'];
        $password = $data['password'];
        $name = $data['name'];

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;

        $user->save();

        return "SUCCESS".$user->name ." has been added";
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.details',['user'=>$user]);
    }

    public function showWithName($name)  {
        $user = User::where('name',$name)->first();
        return view('users.details',["user"=>$user]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    public function edit(Request $request,$id)
    {
        $user = User::findOrFail($id);

        $data = $request->all();
        $user->name = $data['name'];
        $user->email = $data["email"];
        $user->password = $data['password'];

        $user->save();
    }




    
}
