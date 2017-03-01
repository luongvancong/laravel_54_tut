<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends FrontendController
{

    /**
     * [$category description]
     * @var \App\Models\Category
     */
    protected $category;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Category $category, Product $product)
    {
        parent::__construct();
        $this->category = $category;
        $this->product = $product;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->getCategories([], 3);
        $countCategories = $categories->count();

        $hotProducts = $this->product->getHotProducts();
        $newestProducts = $this->product->getNewestProducts();

        return view('home/index', compact('categories', 'countCategories', 'hotProducts', 'newestProducts'));
    }
}
