<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCarsController extends Controller
{
    public function index(){
        $cars = Car::orderBy('model')->get();
        $carsCount = Car::count();
        $rentCarCount = Car::where('isRent', 1)->count();
        $userCount = User::count();
        return view('admin.pages.cars', compact('cars','carsCount','rentCarCount','userCount'));
    }

    public function addCarsView(){
        return view('admin.pages.addcars');
    }

}
