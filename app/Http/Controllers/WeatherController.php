<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\WeatherInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WeatherController extends Controller
{
    public function index()
    {
        $httpClient = new \GuzzleHttp\Client();
        $cities = City::all();
        $response = array();

        foreach ($cities as $city) {
            $lon = $city->longitude;
            $lat = $city->latitude;
            $request = $httpClient->get("https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}2&appid=".env('API_KEY')."&units=metric");
            $body = json_decode($request->getBody()->getContents());
            return $body;
//            WeatherInformation::create([
//                'time' =>
//            ]);
        }

        return $response;







    }
}
