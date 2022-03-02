<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ResturantContract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resturant;
use App\DataTables\RestDataTable;
use App\Http\Requests\Admin\ResturantStoreRequest;
use App\Http\Requests\Admin\ResturantUpdateRequest;
use App\Models\Category;
use Facade\FlareClient\Stacktrace\File;

class RestaurantController extends Controller
{
    public function __construct(ResturantContract $resturantServices)
    {
        $this->resturantServices = $resturantServices;
    }

    public function index(RestDataTable $RestDataTable)
    {
        $res_show = Resturant::all();
        $category = Category::all();
        return $RestDataTable->render('Admin.forms.AddResturant.add_restaurant', compact('res_show', 'category'));
    }
    public function create(Request $request)
    {
        // $validated = $request->validate([
        //     'category_id' => 'required',
        // ]);
        $category = Category::all();
        return view('Admin.forms.AddResturant.add_new_restaurant',compact('category'));
    }
    public function store(ResturantStoreRequest  $request)
    {
        return $this->resturantServices->store($request->all());
    }
    public function show($id)
    {
        $rest_view = Resturant::find($id);
        return view('Admin.forms.AddResturant.restaurant_view', compact('rest_view'));
    }
    public function edit($id)
    {
        $rest_cat = Category::all();
        $rest_view = Resturant::where('id', $id)->first();
        return view('Admin.forms.AddResturant.rest_edit', compact('rest_cat', 'rest_view'));
    }
    public function update(ResturantUpdateRequest $request)
     {
        return $this->resturantServices->update($request->all());
     }

    public function destroy(Request $request)
    {
        $delete = Resturant::where('id', $request->id)->delete();
        return response()->json(['data' => $delete]);
    }

    public function statusChange(Request $request)
    {
        $id = $request['id'];
        $category = Resturant::find($id);
        if ($category->status == "1") {
            $category->status = "0";
        } else {
            $category->status = "1";
        }
        $category->save();
        return response()->json(['data' => $category]);
    }
}
