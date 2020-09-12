<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use function GuzzleHttp\json_decode;

class BlogController extends Controller
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
        $data = DB::table('products')->select('id', 'catalog_id', 'name', 'qty', 'status', 'price', 'discount', 'thumbnail', 'images', 'views', 'created_at')->get();
        $catrgory = DB::table('categories')->select('id', 'name')->get();
        return view('page.blog',  ['data' => $data, 'catrgory' => $catrgory]);
    }
    public function add_form()
    {
        $data = DB::table('categories')->select('id', 'name')->get();
        return view('admin.products.new',  ['data' => $data]);
    }
    public function add_action(Request $request)
    {

        $name = $request->input('name');
        $qty = $request->input('amout');
        $status = $request->input('status');
        $price = $request->input('price');
        $discount = $request->input('discount');
        $category = $request->input('category');
        $content = $request->input('content');
        $created_at = date('Y-m-d H:i:s');
        $thumbnail_name = $request->file('thumbnail')->getClientOriginalName();
        $thumbnail_changName = rand(99, 999) . "-Product-thumbnail-" . $thumbnail_name;
        $request->file('thumbnail')->move(
            'img/products',
            $thumbnail_changName
        );
        $image =  array();
        foreach ($request->file('images') as $key) {
            $images_name = $key->getClientOriginalName();
            $images_changName = rand(99, 999) . "-Product-images-" . $images_name;
            $key->move(
                'img/products',
                $images_changName
            );
            array_push($image, $images_changName);
        }
        $images = json_encode($image);
        $data = array('catalog_id' => $category, 'name' => $name, 'qty' => $qty, 'status' => $status, 'price' => $price, 'discount' => $discount, 'thumbnail' => $thumbnail_changName, 'images' => $images, 'content' => $content, 'created_at' => $created_at);
        DB::table('products')->insert($data);
        return redirect('product_Admin')->with('message', 'Add new sucess');
    }
    public function edit_form($id)
    {
        $data1 = DB::table('categories')->select('id', 'name')->get();
        $data = DB::table('products')->where('id', $id)->select('id', 'catalog_id', 'name', 'qty', 'status', 'price', 'discount', 'thumbnail', 'images', 'content')->get();
        return view('admin.products.edit',  ['id' => $id, 'data1' => $data1, 'data' => $data]);
    }
    public function edit_action(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $qty = $request->input('amout');
        $status = $request->input('status');
        $price = $request->input('price');
        $discount = $request->input('discount');
        $category = $request->input('category');
        $content = $request->input('content');
        $update_at = date('Y-m-d H:i:s');
        $old_thumbnail = $request->input('old_thumbnail');
        if ($request->hasFile('thumbnail')) {
            $thumbnail_name = $request->file('thumbnail')->getClientOriginalName();
            $thumbnail_changName = rand(99, 999) . "-Product-thumbnail-" . $thumbnail_name;
            if ($thumbnail_changName != "") {
                unlink('img/products/' . $old_thumbnail);
                $request->file('thumbnail')->move(
                    'img/products',
                    $thumbnail_changName
                );
            } else {
                $thumbnail_changName = $old_thumbnail;
            }
        } else {

            $thumbnail_changName = $old_thumbnail;
        };
        $old_image = $request->input('old_image');
        if ($request->hasFile('images')) {
            $old_images = json_decode($old_image);
            foreach ($old_images as $keys) {
                unlink('img/products/' . $keys);
            }
            $image =  array();
            foreach ($request->file('images') as $key) {
                $images_name = $key->getClientOriginalName();
                $images_changName = rand(99, 999) . "-Product-images-" . $images_name;
                $key->move(
                    'img/products',
                    $images_changName
                );
                array_push($image, $images_changName);
            }
            $images = json_encode($image);
            $data = array('catalog_id' => $category, 'name' => $name, 'qty' => $qty, 'status' => $status, 'price' => $price, 'discount' => $discount, 'thumbnail' => $thumbnail_changName, 'images' => $images, 'content' => $content, 'updated_at' => $update_at);
            DB::table('products')->where('id', $id)->update($data);
            return redirect('product_Admin')->back()->with('message', 'Update sucess');
        } else {
            $data = array('catalog_id' => $category, 'name' => $name, 'qty' => $qty, 'status' => $status, 'price' => $price, 'discount' => $discount, 'thumbnail' => $thumbnail_changName, 'content' => $content, 'updated_at' => $update_at);
            DB::table('products')->where('id', $id)->update($data);
            return redirect('product_Admin')->with('message', 'Update sucess');
        }
    }
    public function delete_action($id)
    {
        $thumbnail = DB::table('products')->where('id', $id)->value('thumbnail');
        $image = DB::table('products')->where('id', $id)->value('images');
        $images = json_decode($image);
        foreach ($images as $keys) {
            unlink('img/products/' . $keys);
        }
        unlink('img/products/' . $thumbnail);
        DB::table('products')->delete($id);
        return redirect('product_Admin')->with('message', 'Delete sucess');
    }
}
