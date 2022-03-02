<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DiscountCoupon;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\RestaurantAddMeal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function OrderDetails(Request $request)
    {
        $user = User::pluck('id')->toArray();
        $detail = new OrderDetails;
        $prices = RestaurantAddMeal::select('price')->where('id', $request->meal_add_id)->first();
        $detail->rest_id = $request->rest_id;
        $detail->meal_id = $request->meal_add_id;
        $detail->user_id = $user;
        $detail->price = $prices->price;
        $detail->save();
        return $detail;
    }
    public function OrderDone(Request $request)
    {
        dd(2);
        $dis_value = DiscountCoupon::get()->first();
        $toDate = Carbon::now()->format('Y-m-d');
        if (isset($request['apply_promo_code'])) {
            $promo_code = DiscountCoupon::where('promo_code', $request['apply_promo_code'])->first();
            if ($toDate <= $promo_code['end_date'] && $promo_code['start_date'] <= $toDate) {
                $apply_promo_code = $request['apply_promo_code'];
            } else {
                dd('Promocode is Expried');
            }
            if ($promo_code != null) {
                $user_ues = Order::where('apply_promo_code', $request['apply_promo_code'])
                ->where('rest_id', $request['rest_id'])->get()->first();
                if ($user_ues == null) {
                    $rand = rand(1000, 9999);
                    $value = OrderDetails::where('user_id', Auth::user()->id)->get();
                    $payment = OrderDetails::select('price')->where('user_id', Auth::user()->id)->pluck('price')->toArray();
                    $sum = collect($payment)->sum();
                    $order = new Order;
                    $order->rest_id = $request['rest_id'];
                    $order->user_id = Auth::user()->id;
                    $order->order_id = $rand;
                    $order->apply_promo_code = $apply_promo_code;
                    $order->discount = $dis_value->discount;
                    $order->total = $sum;
                    $order_details_delete = OrderDetails::where('user_id', Auth::user()->id)->get();
                    $order->save();
                    foreach ($order_details_delete as $value) {
                        $value->delete();

                    }
                    return $order;
                } else {
                    dd('Discountcode  is used');
                }
            } else {
                dd('invalid Discount');
            }
        } else {
            $rand = rand(1000, 9999);
            $value = OrderDetails::where('id', Auth::user()->id)->get()->first();
            $payment = OrderDetails::where('user_id', Auth::user()->id)->pluck('price')->toArray();
            $sum = collect($payment)->sum();
            $order = new Order;
            $order->rest_id = $value['rest_id'];
            $order->user_id = Auth::user()->id;
            $order->order_id = $rand;
            $order->status = $request->status;
            $order->discount = $request->discount;
            $order->total = $sum;
            $order->save();
            return $order;
        }
    }
    public function orderview()
    {
        dd(3);
        return Order::get();
    }

    public function payProcess(Request $request){
        $total = Order::where('order_id', $request->order_id)->get()->first();
        $pay = Payment::create([
            'order_id' => $request->order_id,
            'user_id' => Auth::user()->id,
            'rest_id' => $total->rest_id,
            'total_amount' => $total->total,
        ]);
        return response()->json(
        "Pay Done",
        );
        // dd($pay);
    }
}
