<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarType;
use App\Car;


class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $types = array();

        foreach(CarType::all() as $type) {
            $types[$type->id] = $type->name;
        }
        $seats = array(
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
            7 => 7,
            8 => 8,
            9 => 9,
        );

        $doors = array(
            1 => 1,
            2 => 2,
            3 => 3,
            4 => 4,
            5 => 5,
            6 => 6,
        );

      
        $car_types = CarType::all();
        return view('cars.index')
        ->with('cars', Car::with('cartyp')->get())
        ->with('car_typ', $types)
        ->with('available_at', date("Y-m-d"))
        ->with('seats', $seats)
        ->with('doors', $doors)          
        ->with('car_types', $car_types);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Car();
        $car->title = $request->title;
        $car->type_id = $request->type_id;
        $car->description = $request->description;
        $car->price = $request->price;
        $car->available_at = $request->available_at;
        $car->transmission = $request->transmission;
        $car->aircon = $request->aircon;
        $car->seats = $request->seats;
        $car->doors = $request->doors;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'.$ext;
            $file->move('car/', $filename);
            $car->image = $filename;
        }
        

       
        $car->save();
        return redirect()->route('createcars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        
        $car_types = CarType::all();
        $cars = Car::find($id);
        return view('cars.edit',[$id] )
        ->with('cars', $cars)
        ->with('car_types', $car_types);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $car = Car::find($id)->first();
        $car->title = $request->title;
        $car->type_id = $request->type_id;
        $car->description = $request->description;
        $car->price = $request->price;
        $car->available_at = $request->available_at;
        $car->transmission = $request->transmission;
        $car->aircon = $request->aircon;
        $car->seats = $request->seats;
        $car->doors = $request->doors;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() .'.'.$ext;
            $file->move('car/', $filename);
            $car->image = $filename;
        }
        

        
        $car->save();
        return redirect()->route('createcars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();
        return redirect()->route('createcars');
    }
}
