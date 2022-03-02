<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission = Permission::all();
        return view('Admin.permission.add_permission', compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $permission = Permission::all();
        return view('Admin.permission.create_permission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'module' => 'required',
            'gaurd' => 'required',
        ]);
        $permissions = array();
        $create_per = $request->module . '-create';
        $update_per = $request->module . '-update';
        $view_per = $request->module . '-list';
        $delete_per = $request->module . '-delete';

        $permissions[] = $create_per;
        $permissions[] = $update_per;
        $permissions[] = $view_per;
        $permissions[] = $delete_per;
        foreach ($permissions as $permission) {
            Permission::create(
                [
                    'name' => $permission,
                    'permission_module_name' => $request->module,
                    'guard_name' => $request->gaurd,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
         return redirect()->route('admin.permission.index');
    }

    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
