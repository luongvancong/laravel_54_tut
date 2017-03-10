<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailController extends FrontendController
{
    public function __construct(Product $product, Category $category)
    {
        parent::__construct();
        $this->product = $product;
        $this->category = $category;
    }

    public function getDetail($id, $slug)
    {
        $product = $this->product->findOrFail($id);
        $categories = $this->category->getCategories();

        return view('product/detail', compact('product', 'categories'));
    }
}
