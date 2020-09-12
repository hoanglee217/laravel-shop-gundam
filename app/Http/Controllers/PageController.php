<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('page.index');
    }

    //about
    public function about()
    {
        return view('page.about');
    }

    //blog
    public function blog()
    {
        return view('page.blog');
    }

    //contact
    public function contact()
    {
        return view('page.contact');
    }

    //listing
    public function listing()
    {
        return view('page.listing');
    }

    //testimonials
    public function testimonials()
    {
        return view('page.testimonials');
    }
}
