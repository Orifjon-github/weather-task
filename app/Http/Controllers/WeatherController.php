<?php

namespace App\Http\Controllers;

use App\Http\Resources\WeatherInformationResource;
use App\Models\City;
use App\Models\WeatherInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WeatherController extends Controller
{
    public function index()
    {
        $response = WeatherInformationResource::collection(WeatherInformation::all());
        return json_encode([
            'success' => true,
            'code' => 200,
            'message' => 'OK',
            'data' => $response
        ]);
    }
    public function show(Request $request) {
        $city_id = City::where('name', $request->city)->first()->id;
        $response = WeatherInformationResource::collection(WeatherInformation::where('city_id', $city_id)->get());
        return json_encode([
            'success' => true,
            'code' => 200,
            'message' => 'OK',
            'data' => $response
        ]);
    }
}
