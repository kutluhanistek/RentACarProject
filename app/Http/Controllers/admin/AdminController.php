<?php

namespace App\Http\Controllers\admin;

use App\Models\Car;
use App\Models\CarStatus;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        $username = auth()->check() ? auth()->user()->name : 'Oturum açmamış kullanıcı';
        $carsCount = Car::count();
        $rentCarCount = Car::where('isRent', 1)->count();
        $userCount = User::count();
        $rentCars = CarStatus::all();

        return view('admin.pages.dashboard', compact('username','carsCount','rentCarCount','userCount','rentCars'));
    }
    public function received($id){
        $carStatus = CarStatus::where('id', $id)->first();
        $car = Car::where('id',$carStatus->arac_id)->first();
        $car->isRent = 0;
        $car->save();
        $carStatus->delete();
        return redirect()->route('admin_dashboard');
    }
}
