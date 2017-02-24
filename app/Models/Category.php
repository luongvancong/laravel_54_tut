<?php

namespace App\Models;

use App\Helpers\Sort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model {

    protected $table = 'product_categories';

    public function getCategories()
    {
        $categories = Category::where('active', 1)->get()->toArray();
        $sort = new Sort($categories);
        $categoriesArray = $sort->getCategories();

        $collection = new Collection();
        foreach($categoriesArray as $item) {
            $category = new Category();
            $category->forceFill($item);
            $collection->push($category);
        }

        return $collection;
    }
}