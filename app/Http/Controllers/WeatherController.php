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
        $response = WeatherInformation::find(1);
        return json_encode([
            'success' => true,
            'code' => 200,
            'message' => 'OK',
            'data' => $response
        ]);







    }
}
