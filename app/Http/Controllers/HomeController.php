<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->getCategories();
        return view('home/index', compact('categories'));
    }
}
