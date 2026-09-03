<?php

namespace App\Traits;

use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;

trait JsonResponsesTrait
{
    public function successResponse(mixed $data, int $statusCode = 200)
    {
        return response()->json(
            [
                "message" => "Success Response",
                "data" => $data
            ],
            $statusCode
        );
    }

    public function failedResponse(string $message, int $statusCode = 400)
    {
        return response()->json(
            [
                "message" => $message
            ],
            $statusCode
        );
    }

    public function jwtFailedResponse(JWTException $ex)
    {
        return response()->json(["error" => $ex->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
