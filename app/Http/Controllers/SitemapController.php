<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Term;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create(route('home'))->setPriority(1.0)->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY))
            ->add(Url::create(route('about'))->setPriority(0.7)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create(route('privacy'))->setPriority(0.5))
            ->add(Url::create(route('contact.index'))->setPriority(0.5));

        // Categories
        Category::all()->each(function (Category $category) use ($sitemap) {
            $sitemap->add(Url::create(route('category.show', $category->slug))
                ->setPriority(0.8)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY));
        });

        // Terms
        Term::where('is_published', true)->each(function (Term $term) use ($sitemap) {
            $sitemap->add(Url::create(route('terms.show', $term->slug))
                ->setPriority(0.9)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)); // Terms don't change often
        });

        return $sitemap->toResponse(request());
    }
}
