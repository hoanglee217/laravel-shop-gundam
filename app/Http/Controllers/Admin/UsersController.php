<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
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
    public function Users()
    {
        $data = DB::table('users')->select('id', 'name', "email", "email_verified_at", "password", "image", "role")->get();
        return view('admin.users.users',  ['data' => $data]);
    }
    public function add_form()
    {
        return view('admin.users.new');
    }
    public function add_action(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $pass = $request->input('password');
        $password = Hash::make($pass);
        $role = $request->input('role');
        $created_at = date('Y-m-d H:i:s');
        $file_name = $request->file('image')->getClientOriginalName('image');
        $request->file('image')->move(
            'img/users',
            $file_name
        );
        $data = array('name' => $name, "email" => $email, "password" => $password, "image" => $file_name, "role" => $role, 'created_at' => $created_at);
        DB::table('users')->insert($data);
        return redirect('user_Admin')->with('message', 'Add new sucess');
    }
    public function edit_form($id)
    {
        $data = DB::table('users')->where('id', $id)->select('id', 'name', "email", "email_verified_at", "password", "image", "role")->get();
        return view('admin.users.edit', ['id' => $id, 'data' => $data]);
    }
    public function edit_action(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $email = $request->input('email');
        $pass = $request->input('password');
        $password = Hash::make($pass);
        $role = $request->input('role');
        $updated_at = date('Y-m-d H:i:s');
        $old_image = $request->input('old_image');
        if ($request->hasFile('image')) {
            $file_name = $request->file('image')->getClientOriginalName();
            if ($file_name != "") {
                if ($old_image == "default.jpg") {
                    $request->file('image')->move(
                        'img/users',
                        $file_name
                    );
                } else {
                    unlink('img/users/' . $old_image);
                    $request->file('image')->move(
                        'img/users',
                        $file_name
                    );
                }
            } else {
                $file_name = $old_image;
            }
        } else {
            $file_name = $old_image;
        }

        $data = array('name' => $name, "email" => $email, "password" => $password, "image" => $file_name, "role" => $role, 'updated_at' => $updated_at);
        DB::table('users')->where('id', $id)->update($data);;
        return redirect('user_Admin')->with('message', 'Update sucess');
    }
    public function delete_action($id)
    {
        $data = DB::table('users')->where('id', $id)->value('image');
        if ($data == "default.jpg") {
            DB::table('users')->delete($id);
            return redirect('user_Admin')->with('message', 'Delete sucess');
        } else {
            unlink("img/users/" . $data);
            DB::table('users')->delete($id);
            return redirect('user_Admin')->with('message', 'Delete sucess');
        }
    }
}
