<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThankController extends FrontendController
{
    public function getIndex()
    {
        return view('thanks/index');
    }
}
