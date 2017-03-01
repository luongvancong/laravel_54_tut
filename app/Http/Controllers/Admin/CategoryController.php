<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * Category
     * @var \App\Models\Category
     */
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getIndex()
    {
        $categories = $this->category->getCategories();
        return view('admin/category/index', compact('categories'));
    }

    public function getCreate()
    {
        $category = new Category();
        $categories = $this->category->getCategories();
        return view('admin/category/create', compact('category', 'categories'));
    }

    public function postCreate(AdminCategoryFormRequest $request)
    {
        $category = new Category();
        $category->fill($request->all());
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Add category success');
    }


    public function getEdit($id)
    {
        $category = $this->category->findOrFail($id);
        $categories = $this->category->getCategories();
        return view('admin/category/edit', compact('category', 'categories'));
    }

    public function postEdit($id, AdminCategoryFormRequest $request)
    {
        $category = $this->category->findOrFail($id);
        $category->fill($request->all());
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Update category success');
    }

    public function getDelete($id)
    {
        $category = $this->category->findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Delete category success');
    }

    public function getActive($id)
    {
        $category = $this->category->findOrFail($id);
        $category->active = !$category->active;
        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Delete category success');
    }
}
