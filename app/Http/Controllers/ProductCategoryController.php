<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductCategoryController extends FrontendController
{
    public function __construct(Category $category, Product $product)
    {
        parent::__construct();
        $this->category = $category;
        $this->product = $product;
    }

    public function getIndex($id, $slug)
    {
        $category = $this->category->findOrFail($id);
        $products = $category->products()->paginate(20);
        $categories = $this->categories;
        return view('category/index', compact('category', 'products', 'categories'));
    }
}
