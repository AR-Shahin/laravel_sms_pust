<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        return view('Admin.settings', compact('settings'));
    }
    public function courseEnrollToggle()
    {
        $settings = Setting::first();
        if (request()->flag === 'close') {
            $settings->is_enroll = false;
            $this->setSuccessMessage('Course Enroll has been Closed!!');
        }

        if (request()->flag === 'open') {
            $settings->is_enroll = true;
            $this->setSuccessMessage('Course Enroll has been Started!!');
        }
        $settings->save();
        return back();
    }
}
