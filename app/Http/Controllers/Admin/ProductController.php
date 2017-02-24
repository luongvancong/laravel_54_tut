<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProductFormRequest;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller {

    /**
     * [$product description]
     * @var \App\Models\Product
     */
    protected $product;


    /**
     * [$category description]
     * @var \App\Models\Category
     */
    protected $category;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function getIndex()
    {
        $products = $this->product->getProducts(20);
        return view('admin/product/index', compact('products'));
    }

    public function getCreate()
    {
        $product = new Product();
        $categories = $this->category->getCategories();
        return view('admin/product/create', compact('product', 'categories'));
    }

    public function postCreate(AdminProductFormRequest $request)
    {
        $data = $request->all();

        if($request->hasFile('image')) {
            $filename = upload('image');
            if($filename) {
                $data['image'] = $filename;
            }
        }

        $product = new Product();
        $product->fill($data);
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Add product successfull');
    }

    public function getEdit($id)
    {
        $product = $this->product->findOrFail($id);
        $categories = $this->category->getCategories();
        return view('admin/product/edit', compact('product', 'categories'));
    }

    public function postEdit($id, AdminProductFormRequest $request)
    {
        $data = $request->all();
        $product = $this->product->findOrFail($id);
        $product->fill($data);
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Add product successfull');
    }

    public function getDelete($id)
    {
        # code...
    }


    public function getActive($id)
    {
        # code...
    }

    public function getHot($id)
    {
        # code...
    }
}