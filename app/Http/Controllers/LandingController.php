<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Truck;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function dashboard(){
        // Dashboard Count static
        $brandsCount = Brand::all()->count();
        $trucksCount = Truck::all()->count();

        $brands = Brand::orderByDesc('created_at')->paginate(8);
        $trucks = Truck::orderByDesc('created_at')->paginate(8);

        return view('landing.dashboard', compact('brandsCount', 'trucksCount', 'trucks', 'brands'));
    }
}
