<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function orders($id = null)
    {
        if (empty($id)) {

            $orders = Order::with('orders_products')->where('user_id', \Illuminate\Support\Facades\Auth::user()->id)->orderBy('id', 'Desc')->get()->toArray();
            // dd($orders);

            return view('front.orders.orders')->with(compact('orders'));

        } else {

            $orderDetails = Order::with('orders_products')->where('id', $id)->first()->toArray();
            // dd($orderDetails);

            return view('front.orders.order_details')->with(compact('orderDetails'));
        }
    }

    public function downloadInvoice($id)
    {
        $orderDetails = Order::with('orders_products')->find($id);

        if (!$orderDetails) {
            return redirect()->back()->with('error', 'Order not found');
        }

        $pdf = PDF::loadView('pdf.invoice', compact('orderDetails'));
        return $pdf->download('invoice-' . $orderDetails->id . '.pdf');
    }
}
