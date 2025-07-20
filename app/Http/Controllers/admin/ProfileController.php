<?php

namespace App\Http\Controllers\admin;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function index()
    {
        $employee = Employee::where('id', Auth::id())->first();
        return view('admin.pages.profile', compact('employee'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'nickname' => 'required',
            'adminPassword' => 'min:6',
            'newPassword' => 'min:6',
            'newPasswordControl' => 'min:6',
        ]);
        $employee = Employee::where('id', Auth::id())->first();
        $password = strip_tags($request->adminPassword);
        $hashedPassword = $employee->sifre;
        if (Hash::check($password, $hashedPassword)) {
            if (!Hash::check($request->newPassword, $hashedPassword)) {
                if ($request->newPassword == $request->newPasswordControl) {
                    $employee->name = strip_tags($request->name);
                    $employee->surname = strip_tags($request->surname);
                    $employee->kullanici_adi = strip_tags($request->nickname);
                    $employee->sifre = strip_tags(Hash::make($request->newPassword));
                    $employee->save();
                    return redirect()->route('admin_profile')->with('Profiliniz başarıyla güncellenmiştir');

                } else {
                    return redirect()->route('admin_profile')->withErrors('Güncel şifreler eşleşmiyor');
                }

            } else {
                return redirect()->route('admin_profile')->withErrors('Güncel şifreniz eski şifrenizle aynı olamaz');
            }


        } else {
            return redirect()->route('admin_profile')->withErrors('Mevcut şifrenizi doğru giriniz');
        }

    }
}
