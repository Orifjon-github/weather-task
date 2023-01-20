<?php

namespace App\Helpers;

class Responses
{
    public function success($data, $code) {
        switch ($code) {
            case 200: return json_encode(['success' => true, 'code' => $code, 'message' => 'OK', 'data' => $data]);
            case 201: return json_encode(['success' => true, 'code' => $code, 'message' => 'City Created Successfully']);
        }
    }

    public function error($code) {
        switch ($code) {
            case 404: return json_encode([ 'success' => false, 'code' => $code,'message' => 'Not Found']);
        }
    }
}
