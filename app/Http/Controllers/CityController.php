<?php

namespace App\Http\Controllers;

use App\Helpers\CityControllerHelpers;
use App\Helpers\Responses;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Models\WeatherInformation;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;

class CityController extends Controller
{

    public function __construct(Responses $responses, CityControllerHelpers $helpers) {
        $this->response = $responses;
        $this->helper = $helpers;
    }

    public function index()
    {
        $data = $this->helper->helper_index();
        if ($data) {
            return $this->response->success(200, $data);
        } else {
            return $this->response->error(404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:cities,name',
            'longitude' => 'required',
            'latitude' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->response->error(405);
        } else {
            City::create($request->all());
            return $this->response->success(201);
        }
    }


    public function show($id)
    {
        $data = $this->helper->helper_show($id);
        if ($data) {
            return $this->response->success(200, $data);
        } else {
            return $this->response->error(404);
        }
    }

}
