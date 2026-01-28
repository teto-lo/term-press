<?php

namespace App\Http\Controllers;

use App\Models\Term;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return redirect()->route('home');
        }

        $terms = Term::where('is_published', true)
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('body', 'like', "%{$query}%")
                  ->orWhere('short_description', 'like', "%{$query}%");
            })
            ->orderBy('title', 'asc') // Arrange alphabetically or by relevance if possible
            ->paginate(20);

        return view('front.search', compact('query', 'terms'));
    }
}
