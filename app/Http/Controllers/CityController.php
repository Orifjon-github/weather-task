<?php

namespace App\Http\Controllers;

use App\Helpers\Responses;
use App\Http\Requests\StoreCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Models\WeatherInformation;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class CityController extends Controller
{

    public function __construct(Responses $responses) {
        $this->response = $responses;
    }

    public function index()
    {
        $cities = City::paginate(10) ?? null;
        if ($cities) {
            $response = CityResource::collection($cities);
            return $this->response->success($response, 200);
        } else {
            return $this->response->error(404);
        }

    }

    public function store(StoreCityRequest $request)
    {
       if (! $request->validated()) {
           return 1;
           return $this->response->error( 405);
       }

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
