<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\RedirectResponse;

class TransactionController extends Controller
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
    }
    public function add_form()
    {
        return view('page.transaction.new');
    }
    public function add_action(Request $request)
    {
        $user_id = Auth::user()->id;
        $name = $request->input('name');
        $user_phone = $request->input('phone');
        $user_address = $request->input('address');
        $payment = $request->input('payment');
        $payment_info = $request->input('payment_info');
        $ship = $request->input('ship');
        $message = $request->input('message');
        $created_at = date('Y-m-d H:i:s');
        $data = array('user_id' => $user_id, 'name' => $name, 'user_phone' => $user_phone, 'user_address' => $user_address, 'payment' => $payment, 'payment_info' => $payment_info, 'ship' => $ship, 'message' => $message, 'created_at' => $created_at);
        DB::table('transaction')->insert($data);
        return redirect('payment');
    }
    public function edit_form($id)
    {
        $data = DB::table('transaction')->where('id', $id)->get();
        return view('page.transaction.edit',  ['data' => $data]);
    }
    public function edit_action(Request $request)
    {
        $id = $request->input('id');
        $user_id = Auth::user()->id;
        $name = $request->input('name');
        $user_phone = $request->input('phone');
        $user_address = $request->input('address');
        $payment = $request->input('payment');
        $payment_info = $request->input('payment_info');
        $ship = $request->input('ship');
        $message = $request->input('message');
        $update_at = date('Y-m-d H:i:s');
        $data = array('user_id' => $user_id, 'name' => $name, 'user_phone' => $user_phone, 'user_address' => $user_address, 'payment' => $payment, 'payment_info' => $payment_info, 'ship' => $ship, 'message' => $message, 'updated_at' => $update_at);
        DB::table('transaction')->where('id', $id)->update($data);
        return redirect('payment');
    }
    public function delete_action($id)
    {
        DB::table('transaction')->delete($id);
        return redirect('payment');
    }
}
