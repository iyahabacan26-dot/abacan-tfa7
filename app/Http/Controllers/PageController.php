<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    // Display the Landing Page
    public function index()
    {
        return view('home');
    }

    // Display the About Page
    public function about()
    {
        return view('about');
    }
}
