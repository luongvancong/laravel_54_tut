<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = ['name', 'price', 'teaser', 'content','category_id', 'quantity', 'promotion_price', 'image'];


    public function getProducts($perPage = 20, array $filter = array(), array $sort = array(), $paginate = true)
    {
        $query = $this->with('category')->whereRaw(1);

        if(!$sort) $sort = ['created_at' => 'DESC'];

        foreach($sort as $key => $value) {
            $query->orderBy($key, $value);
        }

        if($paginate) {
            return $query->paginate($perPage);
        }

        return $query->take($perPage)->get();
    }


    public function getHotProducts($take = 12)
    {
        return $this->with('category')
                    ->where('hot', 1)
                    ->where('active', 1)
                    ->take($take)
                    ->get();
    }


    public function getNewestProducts($take = 12)
    {
        return $this->with('category')
                    ->where('active', 1)
                    ->orderBy('created_at', 'DESC')
                    ->take($take)
                    ->get();
    }


    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}