<?php

namespace App\Helpers;

use App\Http\Resources\CityResource;
use App\Models\City;

class CityControllerHelpers
{
    public function helper_index() {
        $cities = City::paginate(10) ?? null;
        if ($cities) {
            $response = CityResource::collection($cities);
            return $response;
        } else {
            return false;
        }
    }
    public function helper_show($id) {
        $city = City::find($id) ?? null;
        if ($city) {
            $response = new CityResource($city);
            return $response;
        } else {
            return false;
        }
    }
}
