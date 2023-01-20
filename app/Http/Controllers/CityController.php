<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\WeatherInformation;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $response = City::all();

        return json_encode([
            'success' => true,
            'code' => 200,
            'message' => 'OK',
            'data' => $response
        ]);
    }


    public function store(Request $request)
    {
       City::create([
            'name' => $request->name,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);

        return json_encode([
            'success' => true,
            'code' => 200,
            'message' => 'City Created Succesfully',
            'data' => []
        ]);
    }


    public function show($id)
    {
        $response = City::find($id);
        return json_encode([
            'success' => true,
            'code' => 200,
            'message' => 'OK',
            'data' => $response
        ]);
    }

}
