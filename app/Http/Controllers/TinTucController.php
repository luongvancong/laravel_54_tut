<?php

namespace App\Http\Controllers;

use App\Http\Requests\TinTucFormRequest;
use App\TinTuc;
use Illuminate\Http\Request;

class TinTucController extends Controller
{

    public function getIndex()
    {
        return view('danh_sach_tin_tuc');
    }

    public function getChiTiet()
    {
        return view('chi_tiet_tin_tuc');
    }

    public function getCreate(Request $request)
    {
        return view('them_tin');
    }

    public function postCreate(TinTucFormRequest $request)
    {
        $tintuc = new TinTuc();
        $tintuc->tieu_de = $request->get('title');
        $tintuc->noi_dung = $request->get('content');
        $tintuc->save();

        return redirect('/');
    }
}
