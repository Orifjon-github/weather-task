<?php

namespace App\Helpers;

class Responses
{
    public function success($data = []) {
        return json_encode([
                'success' => true,
                'code' => 200,
                'message' => 'OK',
                'data' => $data
            ]);

    }
    public function error() {
        return json_encode([
            'success' => false,
            'code' => 404,
            'message' => 'Not Found',
        ]);
    }
}
