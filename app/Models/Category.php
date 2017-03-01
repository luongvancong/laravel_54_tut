<?php

namespace App\Models;

use App\Helpers\Sort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model {

    protected $fillable = ['name', 'parent_id', 'teaser', 'content'];

    public function getCategories(array $filter = array(), $take = 1000)
    {
        $query = Category::whereRaw(1);

        $active = array_get($filter, 'active', -1);

        if($active >= 0) {
            $query->where('active', $active);
        }

        $categories = $query->take($take)->get()->toArray();
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

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}