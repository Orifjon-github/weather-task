<?php

namespace App\Helpers;

class Responses
{
    public function success($data, $code) {
        switch ($code) {
            case 200: return response()->json(['success' => true, 'code' => $code, 'message' => 'OK', 'data' => $data]);
            case 201: return response()->json(['success' => true, 'code' => $code, 'message' => 'City Created Successfully']);
        }
    }

    public function error($code) {
        switch ($code) {
            case 404: return response()->json([ 'success' => false, 'code' => $code, 'message' => 'Not Found']);
            case 405: return response()->json([ 'success' => false, 'code' => $code, 'message' => 'Validation Error: Name, Longitude and Latitude required!']);
        }
    }
}
