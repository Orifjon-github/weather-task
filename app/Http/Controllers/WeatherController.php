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
            return ($this->response->success( 200, $data));
        } else {
            return $this->response->error(404);
        }
    }

    public function show(Request $request) {
        $status = $this->helper->helper_show($request);
        switch ($status[0]) {
            case 200: return ($this->response->success($status[0], $status[1]));
            case 406: return ($this->response->error($status[0]));
            case 407: return ($this->response->error($status[0]));
        }
    }
}
