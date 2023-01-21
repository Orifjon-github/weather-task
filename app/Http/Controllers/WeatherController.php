<?php

namespace App\Http\Controllers;

use App\Helpers\WeatherControllerHelper;
use App\Http\Resources\WeatherInformationResource;
use App\Models\City;
use App\Models\WeatherInformation;
use App\Helpers\Responses;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WeatherController extends Controller
{
    public function __construct(Responses $responses, WeatherControllerHelper $helpers) {
        $this->response = $responses;
        $this->helper = $helpers;
    }

    public function index() {
        $data = $this->helper->helper_index();
        if ($data) {
            return ($this->response->success($data, 200));
        } else {
            return $this->response->error(404);
        }
    }

    public function show(Request $request) {
        $data = $this->helper->helper_show($request);
        if ($data) {
            return ($this->response->success($data, 200));
        } else {
            return $this->response->error(404);
        }
    }
}
