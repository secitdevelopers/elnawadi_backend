<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Order;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SettingWeb;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return view('dashboard.order.index', compact('orders'));
    }


    public function printInvoice($id)
    {
        $setting = Setting::select('logo', 'email', 'company_phone', 'company_address')->first();

        $order = Order::with('user', 'coupon', 'orderItems', 'orderItems.product')->find($id);

        return view('dashboard.order.invoice', compact('order', 'setting'));
        // compact('order','setting')
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function changePaymentStatus(Request $request)
    {
        $order = Order::find($request->id);
        $order->payment_status = $request->payment_status;
        $order->save();
        session()->flash('Add', 'تم تعديل حالة الدفع بنجاح');
        return back();
    }





    public function changeOrderStatus(Request $request)
    {
        $order = Order::find($request->id);
        $order->status = $request->status;
        $order->save();
        session()->flash('Add', 'تم تعديل حالة الطلبيه بنجاح');
        return back();
    }



    public function changeDeliveryTime(Request $request)
    {
        $validatedData = $request->validate([
            'delivery_time' => 'required|date',
        ]);


        $order = Order::find($request->id);
        $order->update($validatedData);
        session()->flash('Add', 'تم تعديل حالة التوصيل بنجاح');
        return back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $order = Order::find($request->id);
        $order->delete();
        session()->flash('delete', 'تم حذف الطلبيه بنجاح ');
        return redirect()->route('orders')->with('success', 'orders deleted successfully');
    }
}