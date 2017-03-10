<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function getIndex(Request $request)
    {
        $orders = $this->order->withTrashed()->paginate(20);
        return view('admin/order/index', compact('orders'));
    }

    public function getDetail($id)
    {
        $order = $this->order->findOrFail($id);
        return view('admin/order/detail', compact('order'));
    }

    public function getDelete($id)
    {
        $order = $this->order->findOrFail($id);
        $order->delete();
        return redirect()->route('admin.order.index')->with('success', 'Delete success');
    }
}
