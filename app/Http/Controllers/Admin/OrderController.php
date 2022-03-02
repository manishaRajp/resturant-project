<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Resturant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function View(OrderDataTable $orderDataTable)
    {
        return $orderDataTable->render('Admin.forms.orders.order_view');
    }

    public function show($id)
    {
        $order_view = Order::with(['Rest', 'user', 'restfood'])->find($id);
        return view('Admin.forms.orders.order_show', compact('order_view'));
    }

    public function delete($id){
        $meal = Order::where('id', $id)->delete();
        return redirect()->back();
    }

    public function statusChange(Request $request)
    {
        $id = $request['id'];
        $status = Order::find($id);

        if ($status->status == "1") {
            $status->status = "0";
            Notification::create([
                'order_id' => $status->id,
                'user_id' => $status->user_id,
                'rest_id' => $status->rest_id,
                'message' => "Your Order has been Approved",
                'status' => 'approve',
            ]);
            $discount = $status->discount;
            $total = $status->total;
            $total_amount = round((int)$discount * (int)$total / 100, 2);
            Payment::create([
                'order_id' => $status->order_id,
                'user_id' => $status->user_id,
                'rest_id' => $status->rest_id,
                'total_amount' => $total_amount,
            ]);
        } else {
            $status->status = "1";
        }
        $status->save();
        return response()->json(['data' => $status]);
    }

}
