<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::orderBy('position')
            ->orderBy('priority', 'desc')
            ->get();

        return view('admin.ads.index', compact('ads'));
    }

    public function create()
    {
        return view('admin.ads.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|in:toc_top,article_bottom,sidebar,header',
            'code' => 'required',
            'is_active' => 'boolean',
            'priority' => 'integer|min:0',
        ]);

        Ad::create($validated);

        return redirect()->route('admin.ads.index')
            ->with('success', '広告を作成しました');
    }

    public function edit(Ad $ad)
    {
        return view('admin.ads.edit', compact('ad'));
    }

    public function update(Request $request, Ad $ad)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|in:toc_top,article_bottom,sidebar,header',
            'code' => 'required',
            'is_active' => 'boolean',
            'priority' => 'integer|min:0',
        ]);

        $ad->update($validated);

        return redirect()->route('admin.ads.index')
            ->with('success', '広告を更新しました');
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();

        return redirect()->route('admin.ads.index')
            ->with('success', '広告を削除しました');
    }
}
