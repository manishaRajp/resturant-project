<?php

namespace App\Repositories;

use App\Contracts\LoginContract;
use App\Contracts\LoginContracts;
use App\Models\RestaurantAddLogin;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Exception;
use Illuminate\Support\Facades\Hash;

class LoginRepository implements LoginContract
{
    public function register($data)
    {
        $input = $data;
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->token = $user->createToken('MyApp')->accessToken;

        return response([
            'user' => $user,
            'User register successfully.'
        ]);
    }

    public function login(array $request)
    {
        
        $user = User::where('email', $request['email'])->first();
        if (!$user || !Hash::check($request['password'], $user['password'])) {
            return response([
                'message' => ['These Password and email does not match.']
            ]);
        }

        return response([
            'token' => $user->createToken('MyApp')->accessToken,
            'user' => $user
        ]);
    }
}
