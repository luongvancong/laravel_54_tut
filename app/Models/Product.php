<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = ['name', 'price', 'teaser', 'content','category_id', 'quantity', 'promotion_price', 'image'];


    public function getProducts($perPage = 20, array $filter = array(), array $sort = array(), $paginate = true)
    {
        $query = $this->whereRaw(1);

        if(!$sort) $sort = ['created_at' => 'DESC'];

        foreach($sort as $key => $value) {
            $query->orderBy($key, $value);
        }

        if($paginate) {
            return $query->paginate($perPage);
        }

        return $query->take($perPage)->get();
    }
}