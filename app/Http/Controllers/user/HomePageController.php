<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $cars = Car::where('isRent', 0)->inRandomOrder()->limit(6)->get();
        return view('user.homepage', compact('cars'));
    }
}
