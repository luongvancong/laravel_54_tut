<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model {

    protected $guarded = ['id'];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'order_details', 'id', 'product_id');
    }
}