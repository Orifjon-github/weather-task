<?php

namespace App\Http\Controllers;

use App\Helpers\Responses;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Models\WeatherInformation;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function __construct(Responses $responses) {
        $this->response = $responses;
    }

    public function index()
    {
        $response = new CityResource(City::paginate(10));
        return $this->response->success($response);
    }


    public function store(Request $request)
    {
       City::create([
            'name' => $request->name,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);

        return $this->response->success();
    }


    public function show($id)
    {
        $response = new CityResource(City::find($id));
        return $this->response->success($response);
    }

}
