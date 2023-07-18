<?php

namespace App\Helpers;

class Response{

    public static function res($message, $code, $data){

        $response = [
            'status' => $code,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response);
    }
}
