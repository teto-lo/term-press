<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function privacy()
    {
        return view('front.static.privacy');
    }

    public function about()
    {
        return view('front.static.about');
    }
}
