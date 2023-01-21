<?php

namespace App\Helpers;

use App\Http\Resources\WeatherInformationResource;
use App\Models\City;
use App\Models\WeatherInformation;

class WeatherControllerHelper
{
    public function helper_index() {
        $all_informations = WeatherInformation::first();
        if ($all_informations) {
            $data = WeatherInformationResource::collection(WeatherInformation::paginate(10));;
            return $data;
        } else {
            return false;
        }
    }

    public function helper_show($request) {
        $city_id = City::where('name', $request->city)->first()->id ?? null;
        if ($city_id) {
            $weather_city = WeatherInformation::where('city_id', $city_id)->get();
            if (! isset($weather_city)) {
                $data = WeatherInformationResource::collection($weather_city);
                return $data;
            }
        } else {
            return false;
        }
    }
}
