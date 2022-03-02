<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    
    public function index()
    {
        return view('Admin.forms.profile');
    }

   
    public function changePasswordview()
    {
        return view('Admin.forms.changepass');
    }
   
    public function changePassword(Request $request)
    {
        $request->validate([
            'oldpassword' => ['required', new MatchOldPassword],
            'newpassword' => ['required'],
            'password_confirmation' => ['same:newpassword'],
        ]);
        Admin::find(auth()->user()->id)->update(['password'=>Hash::make($request->newpassword)]);
        return redirect()->route('admin.dashborad');
    }
   
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        
    }

   
    public function update(Request $request)
    {
        $admin = Admin::get()->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();
        return redirect()->route('admin.profile.index');
    }

    
    public function destroy($id)
    {
        
    }
}
