<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class OdersController extends Controller
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
    public function Oder()
    {
        $data = DB::table('Oders')->select('id', 'transaction_id', "user_id", "product_id", "qty", "price", "status", "created_at")->get();
        $id = DB::table('Oders')->value('id');
        $user_id = DB::table('Oders')->where('id', $id)->value('user_id');
        $product_id = DB::table('Oders')->where('id', $id)->value('product_id');
        $Users = DB::table('Users')->where('id', $user_id)->value('name');
        $product_price = DB::table('products')->where('id', $product_id)->value('price');
        $product_name = DB::table('products')->where('id', $product_id)->value('name');
        return view('admin.oders.oders', ['id' => $id, 'data' => $data, 'Users' => $Users, 'price' => $product_price, 'product_name' => $product_name]);
    }
    public function edit_form($id)
    {
        $data = DB::table('Oders')->where('id', $id)->select('id', 'transaction_id', "user_id", "product_id", "qty", "price", "status", "created_at")->get();
        return view('admin.oders.edit', ['id' => $id, 'data' => $data]);
    }
    public function edit_action(Request $request)
    {
        $id = $request->input('id');
        $qty = $request->input('number');
        $status = $request->input('status');
        $transaction_id = $request->input('transaction_id');
        $data = array('qty' => $qty, "status" => $status, "transaction_id" => $transaction_id);
        DB::table('Oders')->where('id', $id)->update($data);;
        return redirect('oder_Admin')->with('message', 'Update sucess');
    }
    public function delete_action(Request    $request, $id)
    {
        DB::table('Oders')->delete($id);
        return redirect('oder_Admin')->with('message', 'Delete sucess');
    }
    public function view_oder($id)
    {
        $data = DB::table('Oders')->where('id', $id)->select('id', 'transaction_id', "user_id", "product_id", "qty", "price", "status", "created_at")->get();
        $id = DB::table('Oders')->value('id');
        $user_id = DB::table('Oders')->where('id', $id)->value('user_id');
        $product_id = DB::table('Oders')->where('id', $id)->value('product_id');
        $Users = DB::table('Users')->where('id', $user_id)->value('name');
        $product_price = DB::table('products')->where('id', $product_id)->value('price');
        $product_name = DB::table('products')->where('id', $product_id)->value('name');
        return view('admin.oders.view', ['data' => $data, 'Users' => $Users, 'price' => $product_price, 'product_name' => $product_name]);
    }
}
