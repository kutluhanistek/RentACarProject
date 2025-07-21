<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Comment;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    public function index(){
        $cars = Car::all();
        return view('user.cars', compact('cars'));
    }

    public function carDetail($id){
        $car = Car::find($id);
        $cars = Car::where('isRent', 0)->inRandomOrder()->limit(3)->get();
        $comments = Comment::where('arac_id', $id)->get();
        return view('user.car_detail',compact('car','cars','comments'));
    }

    public function comment(Request $request, $id){
        $userId = session('user_id');
        $comment = new Comment();
        $comment->musteri_id = $userId;
        $comment->arac_id = $id;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->route('user_car_detail',$id);

    }

}
