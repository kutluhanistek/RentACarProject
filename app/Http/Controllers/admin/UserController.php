<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.pages.users',compact('users'));
    }

    public function banned($id){
        $user = User::where('id', $id)->first();
        $user->isBanned = 1;
        $user->save();
        return redirect()->route('admin_users');
    }

    public function delete($id){
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->route('admin_users');
    }
}
