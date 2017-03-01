<?php

namespace App\Models;

use App\Helpers\Sort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Setting extends Model {

    protected $fillable = ['company_name', 'logo', 'address', 'phone', 'email'];
}