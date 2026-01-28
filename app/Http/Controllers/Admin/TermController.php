<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use App\Models\Category;
use App\Models\SceneTerm;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TermController extends Controller
{
    public function index()
    {
        $terms = Term::with('category')
            ->latest()
            ->paginate(20);

        return view('admin.terms.index', compact('terms'));
    }

    public function create()
    {
        $categories = Category::all();
        $sceneTerms = SceneTerm::all();
        return view('admin.terms.create', compact('categories', 'sceneTerms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|max:255',
            'slug' => 'required|unique:terms,slug|max:255',
            'body' => 'required',
            'short_description' => 'required|max:100',
            'example' => 'nullable',
            'meta_description' => 'nullable|max:160',
            'custom_ad_code' => 'nullable',
            'is_published' => 'boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $term = Term::create($validated);
        $term->sceneTerms()->sync($request->input('scene_term_ids', []));

        return redirect()->route('admin.terms.index')
            ->with('success', '記事を作成しました');
    }

    public function edit(Term $term)
    {
        $categories = Category::all();
        $sceneTerms = SceneTerm::all();
        return view('admin.terms.edit', compact('term', 'categories', 'sceneTerms'));
    }

    public function update(Request $request, Term $term)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:terms,slug,' . $term->id,
            'body' => 'required',
            'short_description' => 'required|max:100',
            'example' => 'nullable',
            'meta_description' => 'nullable|max:160',
            'custom_ad_code' => 'nullable',
            'is_published' => 'boolean',
        ]);

        $term->update($validated);
        $term->sceneTerms()->sync($request->input('scene_term_ids', []));

        return redirect()->route('admin.terms.index')
            ->with('success', '記事を更新しました');
    }

    public function destroy(Term $term)
    {
        $term->delete();

        return redirect()->route('admin.terms.index')
            ->with('success', '記事を削除しました');
    }
}
