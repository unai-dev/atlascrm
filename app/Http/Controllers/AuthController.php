<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;

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

        return $this->successResponse($user, Response::HTTP_CREATED);
    }

    public function login(LoginUserRequest $request)
    {
        $validated = $request->validated();

        try {
            if (!$token = auth()->attempt($validated)) {
                return $this->failedResponse("Invalid Credentials", Response::HTTP_FORBIDDEN);
            }

            return $this->respondWithToken($token);
        } catch (JWTException $ex) {
            return $this->jwtFailedResponse($ex);
        }
    }

    public function who()
    {
        try {
            return response()->json(["data" => auth()->user()]);
        } catch (JWTException $ex) {
            return $this->jwtFailedResponse($ex);
        }
    }

    public function logout()
    {
        try {
            auth()->invalidate(auth()->getToken());
            return response()->json([], Response::HTTP_NO_CONTENT);
        } catch (JWTException $ex) {
            return $this->jwtFailedResponse($ex);
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
            return $this->jwtFailedResponse($ex);
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
