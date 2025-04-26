<?php

namespace App\Helpers;

use Illuminate\Http\Response;

class ApiResponseHelper
{
    public static function jsonApiResponse(array $data, int $status = Response::HTTP_OK)
    {
        return response()->json([
            'jsonapi' => [
                'version' => '1.0'
            ],
            'data' => $data,
        ], $status);
    }
}
