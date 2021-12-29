<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterRequest;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $inputs = $request->validated();
        $user = new User();
        $user->fill($inputs);
        $user->save();

        $token = auth()->login($user);
        

        return $this->respondWithToken($token, $user);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Email or Password is Invalid'], 401);
        }
        $user = auth()->user();
        $user= User::where('id',$user->id)->first();

        return $this->respondWithToken($token,$user);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token,$user)
    {
        return response()->json([
            'user_info'    => $user,
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60
        ]);
    }
}
