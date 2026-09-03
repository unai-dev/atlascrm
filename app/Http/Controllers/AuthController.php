<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "password" => bcrypt($validated["password"])
        ]);

        return response()->json(["data" => $user], Response::HTTP_CREATED);
    }

    public function login(LoginUserRequest $request)
    {
        $validated = $request->validated();

        try {
            if (!$token = auth()->attempt($validated)) {
                return response()->json(["error" => "Invalid Credentials"], Response::HTTP_UNAUTHORIZED);
            }

            return $this->respondWithToken($token);
        } catch (JWTException $ex) {
            return response()->json(["error" => $ex->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function who()
    {
        try {
            return response()->json(["data" => auth()->user()]);
        } catch (JWTException $ex) {
            return response()->json(["error" => $ex->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function logout()
    {
        try {
            auth()->invalidate(auth()->getToken());
            return response()->json([], Response::HTTP_NO_CONTENT);
        } catch (JWTException $ex) {
            return response()->json(["error" => $ex->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function refresh()
    {
        try {
            $oldToken = auth()->getToken();
            $newToken = auth()->refresh();
            auth()->invalidate($oldToken);
            return $this->respondWithToken($newToken);
        } catch (JWTException $ex) {
            return response()->json(["error" => $ex->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    private function respondWithToken(string $token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
