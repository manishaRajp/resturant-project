<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DiscountCoupon;
use Illuminate\Http\Request;

use App\DataTables\DiscountCouponDatatable;
use App\Http\Requests\Admin\PromocodeStoreRequest;
use App\Http\Requests\Admin\PromocodeUpdateRequest;

class DiscountCouponController extends Controller
{
    public function index(DiscountCouponDatatable $DiscountCouponDatatable)
    {
        $discount = Product::all();
        return $DiscountCouponDatatable->render('Admin.discount.discount_table', compact('discount'));
    }

    public function create()
    {
        return view('Admin.discount.discount_create');
    }

    public function store(PromocodeStoreRequest $request)
    {
        $add_discount = new DiscountCoupon;
        $add_discount->promo_code = $request->promo_code;
        $add_discount->discount = $request->discount;
        $add_discount->details = $request->details;
        $add_discount->max_transaction = $request->max_transaction;
        $add_discount->min_transaction = $request->min_transaction;
        $add_discount->time_of_applicable = $request->time_of_applicable;
        $add_discount->start_date = $request->start_date;
        $add_discount->end_date = $request->end_date;
        $add_discount -> save();
        return redirect()->route('admin.copun.index');
    }
    public function show($id)
    {
        $code_view = DiscountCoupon::find($id);
        return view('Admin.discount.discount_view', compact('code_view'));
    }

    public function edit($id)
    {
        $code_edit = DiscountCoupon::where('id', $id)->first();
        return view('Admin.discount.discount_edit', compact('code_edit'));
    }

    public function update(PromocodeUpdateRequest $request)
    {
        $update_discount = DiscountCoupon::where('id', $request['id'])->get()->first();
        $update_discount->promo_code = $request['promo_code'];
        $update_discount->discount = $request['discount'];
        $update_discount->details = $request['details'];
        $update_discount->start_date = $request['start_date'];
        $update_discount->end_date = $request['end_date'];
        $update_discount->max_transaction = $request['max_transaction'];
        $update_discount->min_transaction = $request['min_transaction'];
        $update_discount->time_of_applicable = $request['time_of_applicable'];
        $update_discount->save();
        return redirect()->route('admin.copun.index');
    }

    public function destroy($id)
    {
        $user = DiscountCoupon::where('id', $id)->delete();
        return redirect()->route('admin.copun.index');
    }

    public function discountstatus(Request $request)
    {
       
        $id = $request['id'];
        $code = DiscountCoupon::find($id);
        if ($code->status == "1") {
            $code->status = "0";
        } else {
            $code->status = "1";
        }
        $code->save();
        return response()->json(['data' => $code]);
    }
}
