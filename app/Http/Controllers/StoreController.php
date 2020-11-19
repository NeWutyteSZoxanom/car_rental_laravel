<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\CarType;
use Auth;

class StoreController extends Controller
{  
	
    public function index() {
   		$car_types = CarType::all();
   		$cars = Car::orderBy('price')->paginate(4);
		return view('store.index', compact('cars', 'car_types'));
		
	}

	public function bookcar($id) {
		$car_types = CarType::all();
		$car = Car::where('id',$id)->firstOrFail();
        return view('store.booking ', compact('car', 'car_types'));

		// return Redirect::to('/')
		// 	->with('message', 'invalid car id, please try again');
	}
}
