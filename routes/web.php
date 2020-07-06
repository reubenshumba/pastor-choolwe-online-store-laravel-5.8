<?php
use Illuminate\Support\Facades\Route;
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

//Route::get('/', function () {
//    return view('welcome');
//});

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
//


Route::get('/', [
    'uses' => 'ProductsController@index',
    'as' => 'main.index'
]);

Auth::routes();

//Route::group(['prefix' => 'products'], function () {

Route::prefix('/products')->middleware('auth')->group( function () {
    Route::get('/{id}', [
        'uses' => 'ProductsController@show',
        'as' => 'products.show'
    ]);
    Route::get('/', function () {
        //return view('index');
        return redirect()->route("main.index");
    });

});

Route::prefix('/user')->middleware('auth')->group( function ()
{

    // /user/dashboard
    Route::get('/dashboard', [
            'uses' => 'ProductUserController@getProductPerUser',
            'as' => 'dashboard.index'
        ]
    );

    Route::get('/dashboard/{id}', [
        'uses' => 'ProductUserController@playPurchasedProduct',
        'as' => 'dashboard.show'
    ]);

    // /user/profile route
    Route::get('/profile', function () {
        return view('profile.index');
    })->name("profile.index");

    Route::get('/profile/{id}', function () {
        return view('profile.edit');
    })->name("profile.edit");


    //Cart Routes
    //  /user/products/cart
    Route::get('/products/cart', [
        'uses' => 'CartController@index',
        'as' => "products.cart.index"
    ]);

    Route::get('/products/cart/{id}',  [
        'uses' => 'CartController@addToCart',
        'as' => "products.cart.add"
    ]);

    Route::get('/products/cart/{id}/destroy',  [
        'uses' => 'CartController@destroy',
        'as' => "products.cart.destroy"
    ]);

    Route::get('/products/cart/{id}/edit', function () {
    })->name("products.cart.edit");


});

//
//Route::group(['prefix' => 'admin'], function () {

Route::prefix('/admin')->middleware('auth')->group( function () {

    //product  routes
    // /admin/products/
    Route::get('/products/', [
        'uses' => 'Admin\ProductsController@index',
        'as' => 'admin.products.index'
    ]);
    Route::get('/products/create', [
        'uses' => 'Admin\ProductsController@create',
        'as' => 'admin.products.create'
    ]);

    Route::get('/products/{id}/edit', [
        'uses' => 'Admin\ProductsController@edit',
        'as' => 'admin.products.edit'
    ]);
    Route::put('/products/{id}', [
        'uses' => 'Admin\ProductsController@update',
        'as' => 'admin.products.update'
    ]);
    Route::post('/products/', [
        'uses' => 'Admin\ProductsController@store',
        'as' => 'admin.products.store'
    ]);
    Route::delete('/products/{id}/{forceDelete}', [
        'uses' => 'Admin\ProductsController@destroy',
        'as' => 'admin.products.delete'
    ]);
    Route::get('/products/{slugName}/show', [
        'uses' => 'Admin\ProductsController@show',
        'as' => 'admin.products.show'
    ]);

    //product type routes
    //  /admin/products/type
    Route::get('/products/type', [
        'uses' => 'Admin\ProductTypeController@index',
        'as' => 'productTypes.index'
    ]);
    Route::put('/products/type/{id}', [
        'uses' => 'Admin\ProductTypeController@update',
        'as' => 'productTypes.update'
    ]);
    Route::post('/products/type/', [
        'uses' => 'Admin\ProductTypeController@store',
        'as' => 'productTypes.store'
    ]);
    Route::delete('/products/type/{id}', [
        'uses' => 'Admin\ProductTypeController@destroy',
        'as' => 'productTypes.delete'
    ]);

    //product categories routes
    // /admin/products/categories
    Route::get('/products/category', [
        'uses' => 'Admin\CategoryController@index',
        'as' => 'categories.index'
    ]);
    Route::put('/products/category/{id}', [
        'uses' => 'Admin\CategoryController@update',
        'as' => 'categories.update'
    ]);
    Route::post('/products/category', [
        'uses' => 'Admin\CategoryController@store',
        'as' => 'categories.store'
    ]);
    Route::delete('/products/category/{id}', [
        'uses' => 'Admin\CategoryController@destroy',
        'as' => 'categories.delete'
    ]);



    /*Users*/
    // routes
    //   /admin/users/
    Route::get('/users/', [
        'uses' => 'Admin\UsersController@index',
        'as' => 'admin.users.index'
    ]);
    Route::put('/users/{id}', [
        'uses' => 'Admin\UsersController@update',
        'as' => 'admin.users.update'
    ]);
    Route::post('/users/', [
        'uses' => 'Admin\UsersController@store',
        'as' => 'admin.users.store'
    ]);
    Route::delete('/users/{id}', [
        'uses' => 'Admin\UsersController@destroy',
        'as' => 'admin.users.delete'
    ]);


});
