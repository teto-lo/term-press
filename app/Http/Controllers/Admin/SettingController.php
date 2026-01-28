<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $defaultAdsense = SiteSetting::get('default_adsense_code', '');
        return view('admin.settings.index', compact('defaultAdsense'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'default_adsense_code' => 'nullable|string',
        ]);

        SiteSetting::set('default_adsense_code', $request->input('default_adsense_code'));

        return redirect()->route('admin.settings.index')
            ->with('success', '設定を保存しました');
    }
}
