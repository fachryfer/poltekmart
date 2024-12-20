<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopCartController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\CategoryController as AdminCategoryController;
use App\Http\Controllers\AdminPanel\ProductController as AdminProductController;
use App\Http\Controllers\AdminPanel\ImageController as AdminImageController;
use App\Http\Controllers\AdminPanel\MessageController as AdminMessageController;
use App\Http\Controllers\AdminPanel\CommentController as AdminCommentController;
use App\Http\Controllers\AdminPanel\FaqController as AdminFaqController;
use App\Http\Controllers\AdminPanel\AdminUserController as AdminUserController;
use App\Http\Controllers\AdminPanel\OrderController as AdminOrderController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routesw-----
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect(uri: '/anasayfa', destination: '/home');
Route::get('/', function () {
    return view('home.index');
});
Route::get('/', [HomeController::class, 'index'])->name('home');

//**********************LOGİN LOGOUT PANEL ROUTES****************************
Route::view('/loginuser', 'home.login')->name('loginuser');
Route::view('/registeruser', 'home.register')->name('registeruser');
Route::get('/logoutuser', [HomeController::class, 'logout'])->name('logoutuser');

Route::view('/loginadmin', 'admin.login')->name('loginadmin');
Route::post('/loginadmincheck', [HomeController::class, 'loginadmincheck'])->name('loginadmincheck');

Route::get('/admin/login', [HomeController::class, 'login'])->name('admin_login');
Route::post('/admin/logincheck', [HomeController::class, 'logincheck'])->name('admin_logincheck');
Route::get('/admin/logout', [HomeController::class, 'logout'])->name('admin_logout');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/product/{id}', [HomeController::class, 'product'])->name('product');
Route::get('/productcategory/{id}', [HomeController::class, 'categoryproducts'])->name('categoryproducts');

Route::get('/contactus', [HomeController::class, 'contact'])->name('contact');
Route::post('/storemessage', [HomeController::class, 'storemessage'])->name('storemessage');
Route::post('/storecomment', [HomeController::class, 'storecomment'])->name('storecomment');
Route::get('/aboutus', [HomeController::class, 'about'])->name('about');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::post('/getproduct', [HomeController::class, 'getproduct'])->name('getproduct');
Route::get('/productlist/{search}', [HomeController::class, 'productlist'])->name('productlist');

Route::middleware('auth')->group(function () {
    Route::get('/storefavorite/{id}',[HomeController::class, 'storefavorite'])->name('storefavorite');
    Route::get('/destroyfavorite/{id}',[HomeController::class, 'destroyfavorite'])->name('destroyfavorite');
    //USER ROUTES
    Route::prefix('userpanel')->name('userpanel.')->controller(App\Http\Controllers\UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/reviews', 'reviews')->name('reviews');
        Route::get('/reviewdestroy/{id}', 'reviewdestroy')->name('reviewdestroy');
        Route::get('/orders', 'orders')->name('orders');
        Route::get('/orderdetail/{id}', 'orderdetail')->name('orderdetail');
        Route::get('/deleteproduct/{id}','deleteproduct')->name('deleteproduct');
        Route::get('/favorite', 'favoriteproduct')->name('favoriteproduct');
    });
    //SHOPCART ROUTES
    Route::prefix('/cart')->name('shopcart.')->controller(ShopCartController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/store', 'store')->name('store');
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/add/{id}', 'add')->name('add');
        Route::get('/delete/{id}', 'destroy')->name('delete');
        Route::post('/order', 'order')->name('order');
        Route::post('/storeorder', 'storeorder')->name('storeorder');
        Route::get('/ordercomplete', 'ordercomplete')->name('ordercomplete');
    });
    //ADMİN PANEL ROUTES
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminHomeController::class, 'index'])->name('index');
        //ADMIN GENERAL ROUTES
        Route::get('/setting', [AdminHomeController::class, 'setting'])->name('setting');
        Route::post('/setting', [AdminHomeController::class, 'settingupdate'])->name('settingupdate');
        //ADMIN CATEGORY ROUTES
        Route::prefix('/category')->name('category.')->controller(AdminCategoryController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/detail/{id}', 'show')->name('show');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
        //ADMIN PRODUCT ROUTES
        Route::prefix('/product')->name('product.')->controller(AdminProductController::class)->group(function () {
            Route::get('/', [AdminProductController::class, 'index'])->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/detail/{id}', 'show')->name('show');
            Route::get('/delete/{id}', 'destroy')->name('delete');
        });
        //ADMIN IMAGE GALLERY ROUTES
        Route::prefix('/image')->name('image.')->controller(AdminImageController::class)->group(function () {
            Route::get('/{sid}', [AdminImageController::class, 'index'])->name('index');
            Route::post('/store/{sid}', 'store')->name('store');
            Route::get('/delete/{sid}/{id}', 'destroy')->name('delete');
        });
        //ADMIN MESSAGE ROUTES
        Route::prefix('/message')->name('message.')->controller(AdminMessageController::class)->group(function () {
            Route::get('/', [AdminMessageController::class, 'index'])->name('index');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });
        //ADMIN COMMENT ROUTES
        Route::prefix('/comment')->name('comment.')->controller(AdminCommentController::class)->group(function () {
            Route::get('/', [AdminCommentController::class, 'index'])->name('index');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
        });
        //ADMIN FAQ ROUTES
        Route::prefix('/faq')->name('faq.')->controller(AdminFaqController::class)->group(function () {
            Route::get('/', [AdminFaqController::class, 'index'])->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
            Route::get('/show/{id}', 'show')->name('show');
        });
        //ADMIN USER ROUTES
        Route::prefix('/user')->name('user.')->controller(AdminUserController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/show/{id}', 'show')->name('show');
            Route::post('/update/{id}', 'update')->name('update');
            Route::get('/destroy/{id}', 'destroy')->name('destroy');
            Route::post('/addrole/{id}', 'addrole')->name('addrole');
            Route::get('/destroyrole/{uid}/{rid}', 'destroyrole')->name('destroyrole');
        });
        //ORDER ROUTES
        Route::prefix('/order')->name('order.')->controller(AdminOrderController::class)->group(function() {
            Route::get('/{slug}',[AdminOrderController::class, 'index'])->name('index');
            Route::get('/reject/{id}','reject')->name('reject');
            Route::post('/update/{id}','update')->name('update');
            Route::get('/show/{id}','show')->name('show');
            Route::get('/deleteproduct/{id}','deleteproduct')->name('deleteproduct');
            Route::get('/acceptproduct/{id}','acceptproduct')->name('acceptproduct');
        });
    }); //admin panel routes
}); //user auth group
