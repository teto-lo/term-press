<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SceneTerm;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SceneTermController extends Controller
{
    public function index()
    {
        $sceneTerms = SceneTerm::latest()->paginate(20);

        return view('admin.scene_terms.index', compact('sceneTerms'));
    }

    public function create()
    {
        return view('admin.scene_terms.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:scene_terms,slug|max:255',
            'description' => 'nullable',
            'svg' => 'nullable',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:160',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        SceneTerm::create($validated);

        return redirect()
            ->route('admin.scene_terms.index')
            ->with('success', 'シーン用タグを作成しました');
    }

    public function edit(SceneTerm $sceneTerm)
    {
        return view('admin.scene_terms.edit', compact('sceneTerm'));
    }

    public function update(Request $request, SceneTerm $sceneTerm)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:scene_terms,slug,' . $sceneTerm->id,
            'description' => 'nullable',
            'svg' => 'nullable',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:160',
        ]);

        $sceneTerm->update($validated);

        return redirect()
            ->route('admin.scene_terms.index')
            ->with('success', 'シーン用タグを更新しました');
    }

    public function destroy(SceneTerm $sceneTerm)
    {
        $sceneTerm->delete();

        return redirect()
            ->route('admin.scene_terms.index')
            ->with('success', 'シーン用タグを削除しました');
    }
}
