<?php

namespace App\Http\Controllers\API;

use App\Contracts\LoginContract;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    public function __construct(LoginContract $loginServices)
    {
        $this->loginServices = $loginServices;
    }

    public function register(Request $request){
        return $this->loginServices->register($request->all());
    }
    public function login(Request $request){
        return $this->loginServices->login($request->all());
    }
}
