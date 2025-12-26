<?php

namespace App\Http\Controllers;

use App\Constants\ApiResponse;
use Illuminate\Support\Str;

abstract class Controller
{
    protected function responseJson(
        string $key
    ) {
        $res = ApiResponse::get($key);

        $response = [
            'message' => $res['message'],
            'ziyad_error_code' => $res['code'],
            'trace_id' => Str::uuid()->toString(),
        ];

        return response()->json($response, $res['status']);
    }
}
