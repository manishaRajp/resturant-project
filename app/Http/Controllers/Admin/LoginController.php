<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Resturant;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = "admin-view/dashboard";

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('Admin.forms.login');
    }
    
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }

    public function logout(Request $request)
    {
        $this->guard('admin')->logout();
        return redirect()->route('admin.admin_login');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        $authUser = Admin::where('email', $user->email)->first();
        if ($authUser) {
            Auth::login($authUser);
            return redirect()->route('home');
        } else {
            $users = new Admin();
            $users->email = $user->email;
            $users->password = uniqid();
            $users->save();
            Admin::login($users);
            return redirect()->route('home');
        }
    }

    public function registerview()
    {
        $role = Role::all();
        return view('Admin.roles.add_sub_admin', compact('role'));
    }
    public function registersubadmin(Resturant $request)
    {
        $role = new Admin;
        $role->name = $request->name;
        $role->email = $request->email;
        $role->password = Hash::make($request->password);
        $role->save();
        return redirect()->back();
    }
}
