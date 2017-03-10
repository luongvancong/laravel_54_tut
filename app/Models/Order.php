<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model {

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['id', '_token'];

    public function details() {
        return $this->hasMany('App\Models\OrderDetail', 'order_id');
    }
}