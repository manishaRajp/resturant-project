<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\MealContract;
use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\RestaurantAddMeal;
use App\Models\Resturant;
use Illuminate\Http\Request;
use App\DataTables\MealDatatable;
use App\Exports\ExportMeal;
use App\Http\Requests\Admin\ImportRequest;
use App\Http\Requests\Admin\MealStoreRequest;
use App\Http\Requests\Admin\MealUpdateRequest;
use App\Imports\ImportMeal;
use Facade\FlareClient\Stacktrace\File;
use Maatwebsite\Excel\Facades\Excel;

use function DeepCopy\deep_copy;

class MealController extends Controller
{
    public function __construct(MealContract $mealServices)
    {
        $this->mealServices = $mealServices;
    }
    public function index(MealDatatable $MealDatatable)
    {
        $meal = Meal::all();
        return $MealDatatable->render('Admin.forms.AddResturant.add_meal', compact('meal'));
    }

    public function create(Request $request)
    {
        // $validated = $request->validate([
        //     'meal_category' => 'required',
        // ]);
        $rest = Resturant::all();
        $meal = Meal::all();
        return view('Admin.forms.AddResturant.add_new_meal', compact(['request', 'rest','meal']));
    }

    public function store(MealStoreRequest $request)
    {
        return $this->mealServices->store($request->all());
    }

    public function show($id)
    {
        $meal_view = RestaurantAddMeal::find($id);
        return view('Admin.forms.AddResturant.meal_view', compact('meal_view'));
    }
    public function edit($id)
    {
        $meal_cat = Meal::all();
        $rest_view = Resturant::where('status', '1')->get();
        $meal_view = RestaurantAddMeal::where('id', $id)->first();
        return view('Admin.forms.AddResturant.meal_edi  t', compact('meal_cat', 'meal_view', 'rest_view'));
    }
    public function update(MealUpdateRequest $request)
    {
        return $this->mealServices->update($request->all());
    }
    public function destroy(Request $request)
    {
        $delete = RestaurantAddMeal::where('id', $request->id)->delete();
        return response()->json(['data' => $delete]);
    }
    public function quantitycount(Request $request)
    {
        $id = $request['id'];
        $count = RestaurantAddMeal::find($id);
        if ($count->stock == "1") {
            $count->stock = "0";
        } else {
            $count->stock = "1";
        }
        $count->save();
        return response()->json(['data' => $count]);
    }

    
    public function importView(Request $request)
    {
        dd(4354);
        return view('Admin.forms.AddResturant.add_meal');
    }

    public function import(ImportRequest $request)
    {
        Excel::import(new ImportMeal, $request->file('file')->store('files'));
        return redirect()->back();
    }

    public function exportMeal(Request $request)
    {
        return Excel::download(new ExportMeal, 'restaurant_add_meals.xlsx');
    }
}
