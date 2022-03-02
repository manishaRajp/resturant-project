<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;
use App\Models\User;


class UsersController extends Controller
{
    public function index(UserDataTable $UserDataTable)
    {
        return $UserDataTable->render('Admin.forms.users.listdata');
    }

    public function create()
    {
        dd(5657);
    }
    public function store(Request $request)
    {
        dd(5436);
    }
    public function show($id)
    {
        $user_view = User::find($id);
        return view('Admin.forms.users.show',compact('user_view'));
    }
    public function edit($id)
    {
        $users_edit = User::where('id', $id)->first();
        return view('Admin.forms.users.user_edit', compact('users_edit'));
    }
    public function update(Request $request)
    {
        $update_user = User::where('id', $request['id'])->get()->first();
        $update_user->name = $request['name'];
        $update_user->address = $request['address'];
        $update_user->email = $request['email'];
        $update_user->phone = $request['phone'];
        $update_user->save();
        return redirect()->route('admin.user.index');
    }
    public function destroy(Request $request)
    {
        $delete = User::where('id', $request->id)->delete();
        return response()->json(['data' => $delete]);
    }


    public function userstatus(Request $request)
    {
        // dd(3456);
        $id = $request['id'];
        $user_status = User::find($id);
        if ($user_status->status == "1") {
            $user_status->status = "0";
        } else {
            $user_status->status = "1";
        }
        $user_status->save();
        return response()->json(['data' => $user_status]);
    }

   
}
