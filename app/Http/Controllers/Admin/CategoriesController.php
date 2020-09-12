<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
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
    public function Category()
    {
        $data = DB::table('Categories')->select('id', 'name', 'created_at')->get();
        return view('admin.categories.categories',  ['data' => $data]);
    }
    public function add_form()
    {
        return view('admin.categories.new');
    }
    public function add_action(Request $request)
    {
        $name = $request->input('name');
        $created_at = date('Y-m-d H:i:s');
        $data = array('name' => $name, "created_at" => $created_at);
        DB::table('Categories')->insert($data);
        return redirect('category_Admin')->with('message', 'Add new sucess');
    }
    public function edit_form($id)
    {
        $data = DB::table('Categories')->where('id', $id)->select('id', 'name', 'created_at')->get();
        return view('admin.categories.edit', ['id' => $id, 'data' => $data]);
    }
    public function edit_action(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $updated_at = date('Y-m-d H:i:s');
        $data = array('name' => $name, "updated_at" => $updated_at);
        DB::table('Categories')->where('id', $id)->update($data);;
        return redirect('category_Admin')->with('Update', 'Delete sucess');
    }
    public function delete_action($id)
    {
        DB::table('Categories')->delete($id);
        return redirect('category_Admin')->with('message', 'Delete sucess');
    }
}
