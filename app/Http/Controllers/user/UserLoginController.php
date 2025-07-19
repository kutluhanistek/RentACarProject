<?php

namespace App\Http\Controllers\user;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    public function index(){
        return view('login.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'TC' => 'required|min:11|max:11',
            'password' => 'required|min:6'
        ]);
        $password = strip_tags($request->password);
        $user = User::where('TC', strip_tags($request->TC))->first();

        if ($user) {
            $hashedPassword = $user->password;
            if (Hash::check($password, $hashedPassword) and $user->isBanned != 1) {
                $request->session()->regenerate();
                session(["user_id" => $user->id]);
//                $inputs = [
//                    'id'=>$user->id,
//                ];
//                return redirect()->route('user_homepage', Helper::encryptInputs($inputs)); -> url'e gönderdiğim user id'yi hashlememe yarıyor.
                  return redirect()->route('user_homepage');
            } else {
                return redirect()->route('user_login_page');
            }
        } else {
            return redirect()->route('user_login_page');
        }

    }

    public function register(Request $request)
    {
        $request->validate([
            'TC' => 'required|min:11|max:11|unique:users',
            'password' => 'required|min:6',
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'tel_no' => 'required|min:11|max:11',
        ]);
        $user = new User();
        $user->TC = strip_tags($request->TC);
        $user->name = strip_tags($request->name);
        $user->surname = strip_tags($request->surname);
        $user->password = strip_tags(Hash::make($request->password));
        $user->tel_no = strip_tags($request->tel_no);
        $user->isBanned = 0;
        $user->save();
        return redirect()->route('user_login_page');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect()->route('user_login_page');
    }
}
