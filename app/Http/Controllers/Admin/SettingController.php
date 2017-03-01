<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSettingFormRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function getSetting()
    {
        $setting = $this->setting->where('id', 1)->first();
        if(!$setting) {
            $setting = new Setting();
        }

        return view('admin/setting/setting', compact('setting'));
    }

    public function postSetting(AdminSettingFormRequest $request)
    {
        $setting = $this->setting->where('id', 1)->first();

        if(!$setting) {
            $setting = new Setting();
        }

        $data = $request->all();

        if($request->hasFile('logo')) {
            $data['logo'] = upload('logo');
        }

        $setting->fill($data);
        $setting->save();

        return redirect()->route('admin.setting.index')->with('success', 'Update success');
    }
}
