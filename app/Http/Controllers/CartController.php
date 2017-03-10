<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends FrontendController
{
    public function __construct(Product $product)
    {
        parent::__construct();
        $this->product = $product;
    }

    public function getListing()
    {
        $cartItems = Cart::content();

        return view('cart/index', compact('cartItems'));
    }


    public function removeItem($rowId, Request $request)
    {
        Cart::remove($rowId);
        $returnUrl   = $request->get('return_url');

        if($returnUrl) {
            return redirect()->to($returnUrl);
        }

        return redirect()->route('cart.listing');
    }

    public function update(Request $request)
    {
        $action      = $request->get('action');
        $productId   = (int) $request->get('product_id');
        $quantity    = (int) $request->get('quantity');
        $rowId       = $request->get('rowId');
        $productName = $request->get('product_name');
        $price       = (int) $request->get('price');
        $returnUrl   = $request->get('return_url');

        switch ($action) {
            case 'add':
                $product = $this->product->findOrFail($productId);
                Cart::add($productId, $product->name, $product->quantity, $product->price);
                break;

            case 'update':
                Cart::update($rowId, $quantity);
                break;

            default:
                # code...
                break;
        }

        if($returnUrl) {
            return redirect()->to($returnUrl);
        }

        return redirect()->route('cart.listing');
    }
}
