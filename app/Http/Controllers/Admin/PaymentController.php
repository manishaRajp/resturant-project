<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PaymentDataTable;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
    public function index(PaymentDataTable $PaymentDataTable)
    {
        $pay_show = Payment::all();
        return $PaymentDataTable->render('Admin.forms.payment.table_view',compact('pay_show'));

    }
    public function paymentstatus(Request $request)
    {
        $id = $request['id'];
        $code = Payment::find($id);
        if ($code->status == "1") {
            $code->status = "0";
        } else {
            $code->status = "1";
        }
        $code->save();
        return response()->json(['data' => $code]);
    }

   
    public function store(Request $request)
    {
        
    }

    
    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

   
    public function update(Request $request, $id)
    {
       
    }

   
    public function destroy($id)
    {
        
    }
}
