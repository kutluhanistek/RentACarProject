<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Price;
use Illuminate\Http\Request;

class AddCarController extends Controller
{
    public function index() {
        return view('admin.pages.addcars');
    }

    public function addCar(Request $request){
        $car = new Car();
        $gorsel = $request->file('gorsel');
        $path = public_path('img/user');
        $dosyaAdi = $gorsel->getClientOriginalName();
        $gorsel->move($path, $dosyaAdi);
        $car->plaka = $request->plaka;
        $car->marka = $request->marka;
        $car->model = $request->model;
        $car->yakit_turu = $request->yakit_turu;
        $car->renk = $request->renk;
        $car->hasar_kaydi = $request->hasar_kaydi;
        $car->km = $request->km;
        $car->vites = $request->vites;
        $car->koltuk_sayisi = $request->koltuk;
        $car->img_path ='img/user/'. $dosyaAdi;
        $car->isRent = 0;
        $car->save();
        return redirect()->route('add_car_page', ['car_id' => $car->id])->with('show_price_modal', true);


    }

    public function addCarPrices(Request $request)
    {
        $request->validate([
            'arac_id' => 'required|exists:cars,id',
            'daily_price' => 'required|numeric',
            'weekly_price' => 'required|numeric',
            'daily_km_limit' => 'required|numeric',
        ]);

        Price::create([
            'arac_id' => $request->arac_id,
            'daily_price' => $request->daily_price,
            'weekly_price' => $request->weekly_price,
            'daily_km_limit' => $request->daily_km_limit,
        ]);

        return redirect()->back()->with('success', 'Fiyat bilgisi başarıyla eklendi.');
    }

    public function deleteCar($id){
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('admin_cars')->with('success', 'Araç başarıyla silindi.');
    }
}
