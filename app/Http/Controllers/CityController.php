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
        $response = CityResource::collection((City::paginate(10)));
        return $this->response->success($response, 200);
    }


    public function store(Request $request)
    {
       City::create([
            'name' => $request->name,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);

        return $this->response->success([], 201);
    }


    public function show($id)
    {
        $city = City::find($id) ?? null;
        if ($city) {
            $response = new CityResource($city);
            return $this->response->success($response);
        } else {
            return $this->response->error(404);
        }

    }

}
