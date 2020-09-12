<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
        $comments = DB::table('comments')->simplePaginate(3);
        $products = DB::table('products')->simplePaginate(3);
        $catrgory = DB::table('categories')->select('id', 'name')->get();
        return view('page.index',  ['products' => $products, 'catrgory' => $catrgory, 'comments' => $comments]);
    }
    public function contact_form(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|email',
            'message' => 'required|max:60',
        ]);
        return redirect('contact')->with('message', 'Gửi thành công!');
    }
    public function getSearch(Request $request)

    {
        $catrgory = DB::table('categories')->select('id', 'name')->get();
        $product =  DB::table('products')->where('name', 'like', '%' . $request->search . '%')->simplePaginate(10);
        return view('page.shop',  ['data' => $product, 'catrgory' => $catrgory]);
    }
}
