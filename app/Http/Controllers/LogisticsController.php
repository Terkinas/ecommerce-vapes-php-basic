<?php

namespace App\Http\Controllers;

use App\Mail\OrderDispatched;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LogisticsController extends Controller
{
    public function orders()
    {
        try {
            if (isset(auth()->user()->admin)) {
                $orders = Order::orderBy('id', 'ASC')->where('id', '>', 0)->paginate(50);
                $orderedproducts = OrderProduct::get();

                $products = Product::get();
                return view('pages.logistics.orders', compact('orders', 'orderedproducts', 'products'));
            }
        } catch (\Exception $e) {
            return back()->withErrors('Error, try again' . $e);
        }
    }

    public function allorders()
    {
        try {
            if (isset(auth()->user()->admin)) {
                $orders = Order::orderBy('id', 'ASC')->where('id', '>', 0)->paginate(50);
                $orderedproducts = OrderProduct::get();

                $products = Product::get();
                return view('pages.logistics.allorders', compact('orders', 'orderedproducts', 'products'));
            }
        } catch (\Exception $e) {
            return back()->withErrors('Error, try again' . $e);
        }
    }

    public function dispatched(Request $request, $id)
    {
        try {
            if (isset(auth()->user()->admin)) {
                $order = Order::find($id);
                //$order->dispatched = !$order->dispatched;
                $order->save();

                Mail::to($request['email'])->send(new OrderDispatched($order, $request['tracklink']));
            }
            return redirect()->route('logistics.orders');
        } catch (\Exception $e) {
            return back()->withErrors('Error, try again' . $e);
        }
    }
}
