<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\Http\Requests\ValidateUserLogin;
use App\Http\Requests\ValidateUserRegistration;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function register(ValidateUserRegistration $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return new UserResource($user);
    }

    public function login(ValidationUserLogin $request) {
        $credentials = request(['email','password']);
        if(!$token = auth()->attemp($credentials)) {
            return response()->json([
                'errors' => [
                    'msg' => ['Incorect username or password']
                ]
            ], 401);
        }

        return response()->json([
            'type' => 'success',
            'messege' => 'logged in',
            'token' => $token,
        ]);
    }

    public function user() {
        return new UserResource(auth()->user());
    }
}
