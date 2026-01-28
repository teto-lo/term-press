<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Models\Category;
use App\Models\SceneTerm;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('terms')->get();

        $latestTerms = Term::published()
            ->with('category')
            ->latest()
            ->take(10)
            ->get();

        // ✅ 追加：シーン一覧（用語数付き）
        $scenes = SceneTerm::withCount([
            'terms as terms_count' => function ($query) {
                $query->where('is_published', true);
            }
        ])->orderBy('id')->get();

        return view('front.index', compact(
            'categories',
            'latestTerms',
            'scenes'
        ));
    }

    public function category(Category $category)
    {
        $terms = $category->terms()
            ->published()
            ->orderBy('title')
            ->paginate(30);

        return view('front.category', compact('category', 'terms'));
    }

    public function show(Term $term)
    {
        if (!$term->is_published) {
            abort(404);
        }

        $relatedTerms = Term::published()
            ->where('category_id', $term->category_id)
            ->where('id', '!=', $term->id)
            ->limit(5)
            ->get();

        return view('front.show', compact('term', 'relatedTerms'));
    }

    public function scene(SceneTerm $scene)
    {
        $terms = $scene->terms()
            ->published()
            ->with('category')
            ->orderBy('title')
            ->paginate(30);

        return view('front.scene', compact('scene', 'terms'));
    }
}
