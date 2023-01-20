<?php

namespace App\Helpers;

use App\Models\City;
use App\Models\WeatherInformation;
use Carbon\Carbon;

class StoreWeatherInformation
{
    public function __invoke() {
        $httpClient = new \GuzzleHttp\Client();
        $cities = City::all();
        $now = Carbon::now();

        foreach ($cities as $city) {
            $lon = $city->longitude;
            $lat = $city->latitude;
            $request = $httpClient->get("https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}2&appid=".env('API_KEY')."&units=metric");
            $body = json_decode($request->getBody()->getContents());
            WeatherInformation::create([
                'city_id' => $city->id,
                'time' => $now,
                'weather_name' => $body->weather[0]->main,
                'longitude' => $lon,
                'latitude' => $lat,
                'temperature' =>  $body->main->temp,
                'pressure' => $body->main->pressure,
                'humidity' => $body->main->humidity,
                'min_temperature' => $body->main->temp_min,
                'max_temperature' => $body->main->temp_max,
            ]);
        }
    }
}
