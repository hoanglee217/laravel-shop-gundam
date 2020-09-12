<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use function GuzzleHttp\json_decode;

class DashboardController extends Controller
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
        $variable = DB::table('oders')->where('user_id', auth()->id())->get();
        foreach ($variable as $key) {
        }
        $content1 = DB::table('oders')->where([['status', '=', 'Đang chờ'], ['user_id', '=', auth()->id()]])->get();
        $content2 = DB::table('oders')->where([['status', '=', 'Chờ lấy hàng'], ['user_id', '=', auth()->id()]])->get();
        $content3 = DB::table('oders')->where([['status', '=', 'Đang giao'], ['user_id', '=', auth()->id()]])->get();
        $content4 = DB::table('oders')->where([['status', '=', 'Đã giao'], ['user_id', '=', auth()->id()]])->get();
        $content5 = DB::table('oders')->where([['status', '=', 'Đã hủy'], ['user_id', '=', auth()->id()]])->get();
        $content6 = DB::table('oders')->where([['status', '=', 'Trả hàng'], ['user_id', '=', auth()->id()]])->get();
        return view('page.dashboard', ['content1' => $content1, 'content2' => $content2, 'content3' => $content3, 'content4' => $content4, 'content5' => $content5, 'content6' => $content6,]);
    }
}
