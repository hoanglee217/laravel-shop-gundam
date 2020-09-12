<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class CommentsController extends Controller
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
    public function Comment()
    {
        $data = DB::table('Comments')->select('id', 'user_id', 'product_id', 'rating', 'content', 'created_at')->get();
        return view('admin.comments.comments',  ['data' => $data]);
    }
    public function add_form()
    {
        return view('admin.comments.new');
    }
    public function add_action(Request $request)
    {
        $user_id = $request->input('user_id');
        $user_name = $request->input('user_name');
        $product_id = $request->input('product_id');
        $rating = $request->input('rating');
        $content = $request->input('content');
        $created_at = date('Y-m-d H:i:s');
        $data = array('user_id' => $user_id, 'user_name' => $user_name, 'product_id' => $product_id, 'rating' => $rating, 'content' => $content, 'created_at' => $created_at);
        DB::table('Comments')->insert($data);
        return redirect('comment_Admin')->with('message', 'Add new sucess');
    }
    public function edit_form($id)
    {
        $data = DB::table('Comments')->where('id', $id)->select('id', 'user_name', 'product_id', 'rating', 'content', 'created_at')->get();
        return view('admin.comments.edit', ['id' => $id, 'data' => $data]);
    }
    public function edit_action(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $updated_at = date('Y-m-d H:i:s');
        $data = array('name' => $name, "updated_at" => $updated_at);
        DB::table('Comments')->where('id', $id)->update($data);;
        return redirect('comment_Admin')->with('message', 'Update sucess');
    }
    public function delete_action(Request $request, $id)
    {
        DB::table('Comments')->delete($id);
        return redirect('comment_Admin')->with('message', 'Delete sucess');
    }
    public function view_comment($id)
    {
        $data = DB::table('Comments')->where('id', $id)->select('id', 'user_name', 'product_id', 'rating', 'content', 'created_at')->get();
        return view('admin.comments.view',  ['data' => $data]);
    }
}
