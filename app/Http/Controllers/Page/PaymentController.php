<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\confirm_oder;
use Illuminate\Support\Facades\Mail;

use function GuzzleHttp\json_decode;

class PaymentController extends Controller
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
        if (Auth::check() == true) {
            $user_id = Auth::user()->id;
            $carts = DB::table('carts')->where('user_id', $user_id)->get();
            $transaction = DB::table('transaction')->where('user_id', $user_id)->get();
            return view('page.payment',  ['carts' => $carts, 'transaction' => $transaction]);
        } else {
            return redirect('login')->with('message', 'Bạn chưa đăng nhập!');
        }
    }
    public function add_action(Request $request)
    {
        $user_id = Auth::user()->id;
        $user_email = Auth::user()->email;
        $product_id = array();
        $qty = array();
        $cart_id = $request->input('cart_id');
        $cart_qty = $request->input('cart_qty');
        array_push($product_id, $cart_id);
        array_push($qty, $cart_qty);
        $transaction_id = $request->input('transaction_id');
        $total_price = $request->input('total_price');
        $status = "đang chờ";
        $created_at = date('Y-m-d H:i:s');
        $product = json_encode($product_id);
        $qties = json_encode($qty);
        $data = array('user_id' => $user_id, 'product_id' => $product, 'transaction_id' => $transaction_id, 'qty' => $qties, 'price' => $total_price, 'status' => $status, 'created_at' => $created_at);
        DB::table('oders')->insert($data);
        DB::table('carts')->where('user_id', $user_id)->delete();
        Mail::to($user_email)->cc($user_email)->bcc($user_email)->send(new confirm_oder());
        return redirect('cart')->with('message', 'Tạo đơn hàng thành công');
    }
    public function view_oder()
    {
        return view('page.confirm_oder');
    }
}
