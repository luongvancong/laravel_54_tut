<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Cart;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function __construct()
    {
        $setting = Setting::where('id', 1)->first();
        $categories = app('App\Models\Category')->getCategories();
        view()->share('glbSetting', $setting);
        view()->share('GLB_Categories', $categories);
    }
}
