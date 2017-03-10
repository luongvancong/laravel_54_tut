<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Cart;

class OrderController extends FrontendController
{
    public function __construct(Order $order)
    {
        parent::__construct();
        $this->order = $order;
    }

    public function getIndex(Request $request)
    {
        $cartItems = Cart::content();
        return view('order/index', compact('cartItems'));
    }

    public function postIndex(Request $request)
    {
        // $customerName = clean($request->get('customer_name'));
        // $customerPhone = clean($request->get('customer_phone'));
        // $customerEmail = clean($request->get('customer_email'));
        // $customerAddress = clean($request->get('customer_address'));
        // $note = clean($request->get('customer_note'));

        $data = $request->except(['_token', 'action']);
        foreach($data as &$value) {
            $value = xss_clean($value);
        }

        // Lưu đơn hàng
        $order = new Order;
        $order->fill($data);
        $order->save();

        // Lưu chi tiết đơn hàng
        $cartItems = Cart::content();
        $totalMoney = 0;
        foreach($cartItems as $item) {
            $orderDetail = $order->details()->create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'price' => $item->price,
                'quantity' => $item->qty,
                'money' => $item->price * $item->qty,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            $totalMoney += ($item->qty * $item->price);
        }

        // Cập nhật tổng giá trị đơn hàng
        $order->total_money = $totalMoney;
        $order->save();

        Cart::destroy();

        return redirect()->route('thanks');

    }
}
