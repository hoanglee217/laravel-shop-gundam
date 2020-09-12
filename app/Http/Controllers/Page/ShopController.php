<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use function GuzzleHttp\json_decode;

class ShopController extends Controller
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
        $data = DB::table('products')->Paginate(6);
        $catrgory = DB::table('categories')->select('id', 'name')->get();
        return view('page.shop',  ['data' => $data, 'catrgory' => $catrgory]);
    }
    public function view_product($id)
    {
        $catrgory = DB::table('categories')->get();
        $products = DB::table('products')->where('id', $id)->get();
        return view('page.single',  ['products' => $products, 'catrgory' => $catrgory]);
    }
    public function add_comment(Request $request)
    {
        if (Auth::check() == true) {
            $user_id = Auth::user()->id;
            $product_id = $request->input('product_id');
            $rating = $request->input('rating');
            $content = $request->input('content');
            $created_at = date('Y-m-d H:i:s');
            $data = array('rating' => $rating, 'content' => $content, 'user_id' => $user_id,  'product_id' => $product_id, 'created_at' => $created_at);
            DB::table('comments')->insert($data);
            return redirect('home');
        } else {
            return redirect('login')->with('message', "Bạn chưa đăng nhạp!");
        }
    }
}
