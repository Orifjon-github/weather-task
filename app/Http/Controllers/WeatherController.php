<?php

namespace App\Http\Controllers;

use App\Http\Resources\WeatherInformationResource;
use App\Models\City;
use App\Models\WeatherInformation;
use App\Helpers\Responses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WeatherController extends Controller
{
    public function __construct(Responses $responses) {
        $this->response = $responses;
    }

    public function index()
    {
        $data = WeatherInformationResource::collection(WeatherInformation::paginate(10));
        return ($this->response->success($data, 200));
    }

    public function show(Request $request) {
        $city_id = City::where('name', $request->city)->first()->id ?? null;
        if ($city_id) {
            $data = WeatherInformationResource::collection(WeatherInformation::where('city_id', $city_id)->get());
            return $this->response->success($data, 200);

        } else {
            return $this->response->error(404);
        }
    }
}
