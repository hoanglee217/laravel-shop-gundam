<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use function GuzzleHttp\json_decode;

class CartController extends Controller
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
            return view('page.cart',  ['carts' => $carts]);
        } else {
            return redirect('login')->with('message', 'Bạn chưa đăng nhập!');
        }
    }
    public function quick_purchase($product_id)
    {
        if (Auth::check() == true) {
            $qty = 1;
            $created_at = date('Y-m-d H:i:s');
            $transaction_id = 0;
            $user_id = Auth::user()->id;
            if (DB::table('carts')->where([['product_id', '=', $product_id], ['user_id', '=', $user_id]])->exists()) {
                $cart_id = DB::table('carts')->where('product_id', $product_id)->value('id');
                $old_qty = DB::table('carts')->where('id', $cart_id)->value('cart_qty');
                $new_qty = $qty + $old_qty;
                $update_at = date('Y-m-d H:i:s');
                $data = array('cart_qty' => $new_qty, 'updated_at' => $update_at);
                DB::table('carts')->where('id', $cart_id)->update($data);
                $old_update_qty = DB::table('products')->where('id', $product_id)->value('qty');
                $update_qty = $old_update_qty - $new_qty;
                DB::table('products')->update(['qty' => $update_qty]);
                return redirect('cart')->with('message', 'Update sản phẩm thành công');
            } else {
                $price = DB::table('products')->where('id', $product_id)->value('price');
                $data = array('transaction_id' => $transaction_id, 'product_id' => $product_id, 'user_id' => $user_id, 'cart_qty' => $qty, 'cart_price' => $price, 'created_at' => $created_at);
                DB::table('carts')->insert($data);
                $old_update_qty = DB::table('products')->where('id', $product_id)->value('qty');
                $update_qty = $old_update_qty - $qty;
                DB::table('products')->where('id', $product_id)->update(['qty' => $update_qty]);
                return redirect('cart')->with('message', 'Thêm sản phẩm thành công');
            }
        } else {
            return redirect('login')->with('message', 'Bạn chưa đăng nhập!');
        }
    }
    public function add_to_cart(Request $request)
    {
        if (Auth::check() == true) {
            $product_id = $request->input('product_id');
            $qty = $request->input('qty');
            $user_id = $request->input('user_id');
            $created_at = date('Y-m-d H:i:s');
            $transaction_id = 0;
            $user_id = Auth::user()->id;
            if (DB::table('carts')->where([['product_id', '=', $product_id], ['user_id', '=', $user_id]])->exists()) {
                $cart_id = DB::table('carts')->where('product_id', $product_id)->value('id');
                $old_qty = DB::table('carts')->where('id', $cart_id)->value('cart_qty');
                $new_qty = $qty + $old_qty;
                $update_at = date('Y-m-d H:i:s');
                $data = array('cart_qty' => $new_qty, 'updated_at' => $update_at);
                DB::table('carts')->where('id', $cart_id)->update($data);
                $old_update_qty = DB::table('products')->where('id', $product_id)->value('qty');
                $update_qty = $old_update_qty - $new_qty;
                DB::table('products')->update(['qty' => $update_qty]);
                return redirect('cart')->with('message', 'Update sản phẩm thành công');
            } else {
                $price = DB::table('products')->where('id', $product_id)->value('price');
                $data = array('transaction_id' => $transaction_id, 'product_id' => $product_id, 'user_id' => $user_id, 'cart_qty' => $qty, 'cart_price' => $price, 'created_at' => $created_at);
                DB::table('carts')->insert($data);
                $old_update_qty = DB::table('products')->where('id', $product_id)->value('qty');
                $update_qty = $old_update_qty - $qty;
                DB::table('products')->where('id', $product_id)->update(['qty' => $update_qty]);
                return redirect('cart')->with('message', 'Thêm sản phẩm thành công');
            }
        } else {
            return redirect('login')->with('message', 'Bạn chưa đăng nhập!');
        }
    }
    public function update_cart(Request $request)
    {
        $id = $request->input('id');
        $qty = $request->input('qty');
        if ($qty == 0) {
            DB::table('carts')->delete($id);
            return redirect('cart')->with('messages', 'Xóa sản phẩm thành công');
        } else {
            $product_id = DB::table('carts')->where('id', $id)->value('product_id');
            $cart_qty = DB::table('carts')->where('id', $id)->value('cart_qty');
            $old_update_qty = DB::table('products')->where('id', $product_id)->value('qty');
            if ($cart_qty > $qty) {
                $ratio = $cart_qty - $qty;
                $update_qty = $old_update_qty + $ratio;
                DB::table('products')->where('id', $product_id)->update(['qty' => $update_qty]);
            } else {
                $ratio = $qty - $cart_qty;
                $update_qty = $old_update_qty - $ratio;
                DB::table('products')->where('id', $product_id)->update(['qty' => $update_qty]);
            }
            $update_at = date('Y-m-d H:i:s');
            $data = array('cart_qty' => $qty, 'updated_at' => $update_at);
            DB::table('carts')->where('id', $id)->update($data);
            return redirect('cart')->with('message', 'Update sản phẩm thành công');
        }
    }
    public function delete_cart($id)
    {
        $product_id = DB::table('carts')->where('id', $id)->value('product_id');
        $old_update_qty = DB::table('products')->where('id', $product_id)->value('qty');
        $cart_qty = DB::table('carts')->where('id', $id)->value('cart_qty');
        $update_qty = $old_update_qty + $cart_qty;
        DB::table('products')->where('id', $product_id)->update(['qty' => $update_qty]);
        DB::table('carts')->delete($id);
        return redirect('cart')->with('messages', 'Xóa sản phẩm thành công');
    }
}
