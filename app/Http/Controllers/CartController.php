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

    public function addProduct($id)
    {
        $product = $this->product->findOrFail($id);
        Cart::add($id, $product->name, 1, $product->price);

        return redirect()->route('cart.listing')->with('success', 'Add product to cart success');
    }
}
