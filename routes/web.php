<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Page\HomeController@index');

Route::get('/home', 'Page\HomeController@index');
Auth::routes();

//page
Route::get('/shop', 'Page\ShopController@index');
Route::get('/category/{id}', 'Page\CategoryController@index');
Route::get('/blog', 'Page\BlogController@index');
Route::get('/about', 'Page\AboutController@index');
Route::get('/contact', 'Page\ContactController@index');
Route::get('/payment', 'Page\PaymentController@index');
Route::get('/view_product/{id}', 'Page\ShopController@view_product');
Route::post('add_comment', 'Page\ShopController@add_comment');
Route::post('contact_form', 'Page\HomeController@contact_form');
Route::get('dashboard', 'Page\DashboardController@index');
Route::post('getSearch', 'Page\HomeController@getSearch');



//cart//
Route::get('/delete_cart/{id}', 'Page\CartController@delete_cart');
Route::get('/update_cart', 'Page\CartController@update_cart');
Route::get('/cart', 'Page\CartController@index');
Route::post('/add_to_cart', 'Page\CartController@add_to_cart');
Route::get('/quick_purchase/{product_id}', 'Page\CartController@quick_purchase');

//admin//
Route::get('/admin', 'AdminController@index');

//Users
Route::get('/user_Admin', 'Admin\UsersController@Users');
Route::get('/new_user', 'Admin\UsersController@add_form');
Route::post('/add_user', 'Admin\UsersController@add_action');
Route::get('/edit_user/{id}', 'Admin\UsersController@edit_form');
Route::post('/update_user', 'Admin\UsersController@edit_action');
Route::get('/delete_user/{id}', 'Admin\UsersController@delete_action');

//Products
Route::get('/product_Admin', 'Admin\ProductsController@Product');
Route::get('/new_product', 'Admin\ProductsController@add_form');
Route::post('/add_product', 'Admin\ProductsController@add_action');
Route::get('/edit_product/{id}', 'Admin\ProductsController@edit_form');
Route::post('/update_product', 'Admin\ProductsController@edit_action');
Route::get('/delete_product/{id}', 'Admin\ProductsController@delete_action');

//categories
Route::get('/category_Admin', 'Admin\CategoriesController@Category');
Route::get('/new_category', 'Admin\CategoriesController@add_form');
Route::post('/add_category', 'Admin\CategoriesController@add_action');
Route::get('/edit_category/{id}', 'Admin\CategoriesController@edit_form');
Route::post('/update_category', 'Admin\CategoriesController@edit_action');
Route::get('/delete_category/{id}', 'Admin\CategoriesController@delete_action');

//oders
Route::get('/oder_Admin', 'Admin\OdersController@Oder');
Route::post('/add_oder', 'Page\PaymentController@add_action');
Route::get('/view_oder/{id}', 'Admin\OdersController@view_oder');
Route::get('/edit_oder/{id}', 'Admin\OdersController@edit_form');
Route::post('/update_oder', 'Admin\OdersController@edit_action');
Route::get('/delete_oder/{id}', 'Admin\OdersController@delete_action');

//transaction
Route::get('/transaction_Admin', 'Admin\TransactionsController@Transaction');
Route::get('/new_transaction', 'Page\TransactionController@add_form');
Route::post('/add_transaction', 'Page\TransactionController@add_action');
Route::get('/edit_transaction/{id}', 'Page\TransactionController@edit_form');
Route::post('/update_transaction', 'Page\TransactionController@edit_action');
Route::get('/delete_transaction/{id}', 'Page\TransactionController@delete_action');

//Comments
Route::get('/comment_Admin', 'Admin\CommentsController@Comment');
Route::get('/view_comment/{id}', 'Admin\CommentsController@view_comment');
Route::get('/delete_comment/{id}', 'Admin\CommentsController@delete_action');



Route::get('view_oder', 'Page\PaymentController@view_oder');
