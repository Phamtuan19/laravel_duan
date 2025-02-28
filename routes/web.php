<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;

// Customer controllers
use App\Http\Controllers\Customer\HomeController;

use App\Http\Controllers\Customer\PageProductsController;

use App\Http\Controllers\Customer\ProfileController;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Customer\Auth\LoginController;

use App\Http\Controllers\Customer\PaymentController;

use App\Http\Controllers\Customer\CommentController;

use App\Http\Controllers\admin\OrderController;

use App\Http\Controllers\admin\CutomerController;

use App\Http\Controllers\admin\ImagesController;

use App\Http\Controllers\admin\DashboardController;

use App\Http\Controllers\admin\PostController;

use App\Http\Controllers\admin\SliderController;

use App\Http\Controllers\admin\PositionController;

use App\Http\Controllers\Customer\Auth\RegisterController;

use App\Http\Controllers\Customer\Auth\CustomerForgotPasswordController;

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

Auth::routes();

Route::get('/', function () {
    return redirect(route('store.home'));
});

Route::get('/admin', function () {
    return redirect(route('/'));
});


Route::middleware('custom.auth')->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource("users", UserController::class)->except(['edit'])->middleware('can:users');

        Route::resource('products', ProductController::class)->middleware('can:products');

        Route::resource('categories', CategoryController::class)->except(['edit'])->middleware('can:categories');

        Route::resource('brand', BrandController::class)->except(['edit'])->middleware('can:brands');

        Route::resource('orders', OrderController::class)->except('edit', 'store');

        Route::resource('customers', CutomerController::class);

        Route::resource('posts', PostController::class)->middleware('can:posts');

        Route::resource('positions', PositionController::class);

        route::get('permissions/{position}', [PositionController::class, 'permission'])->name('permission');

        route::post('permissions/{position}', [PositionController::class, 'postPermission'])->name('permission');

        // View Post Content
        Route::get('post/content/{post}', [PostController::class, 'postContent'])->name('postContent');

        // xóa mềm bài viết
        Route::get('/listSoftErase', [PostController::class, 'listSoftErase'])->name('listSoftErase');

        // khôi phục bài viết đã xóa
        Route::patch('post/softErase/{post}', [PostController::class, 'postSoftErase'])->name('post_softErase');

        // thay đổi hình ảnh
        Route::patch('images/{image}', [ImagesController::class, 'updateImage'])->name('updateImage');

        Route::delete('images/{image}', [ImagesController::class, 'updateImage'])->name('updateImage');

        // update product avatar
        Route::patch('images/avatar/{image}', [ImagesController::class, 'updateAvatar'])->name('avatar');

        // Xóa mềm sản phẩm
        Route::patch('product/softErase/{product}', [ProductController::class, 'softErase'])->name('softErase');

        // khôi phục sản phẩm đã xóa
        Route::get('product/erase', [ProductController::class, 'listSoftErase'])->name('erase');

        // Image slider
        Route::get('slider', [SliderController::class, 'index'])->name('slider');

        Route::get('slider/create', [SliderController::class, 'createSlider'])->name('slider.create');

        Route::post('slider/store', [SliderController::class, 'store'])->name('slider.post');

        Route::post('slider/delete/{slider}', [SliderController::class, 'delete'])->name('slider.delete');

        Route::get('slider/{slider}', [SliderController::class, 'show'])->name('slider.show');

        Route::PATCH('slider/update/{slider}', [SliderController::class, 'update'])->name('slider.update');
    });
});

Route::prefix('store')->name('store.')->group(function () {

    Route::get('/', [HomeController::class, 'indexHome'])->name('home');

    Route::get('products', [PageProductsController::class, 'indexProducts'])->name('list.products');

    Route::get('products/{code}', [PageProductsController::class, 'showProducts'])->name('product');

    Route::get('gio-hang', [HomeController::class, 'indexCart'])->name('cart');

    Route::get('/posts', [HomeController::class, 'indexPosts'])->name('list.posts');

    Route::get('/posts/{post}', [HomeController::class, 'showPosts'])->name('show.posts');

    Route::resource('comments', CommentController::class);

    Route::middleware('customer.auth')->group(function () {
        Route::get('customer/info/{user}', [ProfileController::class, 'customerInfo'])->name('customer.info');

        // page order information
        Route::get('payment', [PaymentController::class, 'payment'])->name('payment');

        // page check order information
        Route::post('check-order', [PaymentController::class, 'checkPayment'])->name('ckeck.order');

        // page order successfully
        Route::get('order-success', [HomeController::class, 'orderSuccess'])->name('order.success');

        // post comments
        Route::post('comments/reply', [CommentController::class, 'reply'])->name('comments.reply');

        // Edit profile
        Route::post('customer/edit/{user}', [ProfileController::class, 'editInfo'])->name('customer.editInfo');

        // Edit Password
        Route::post('customer/password/{user}', [ProfileController::class, 'editPassword'])->name('customer.editPassword');

        // list Order
        Route::get('listOrder/{user}', [HomeController::class, 'listOrder'])->name('listOrder');

        Route::post('order/cancel/{order}', [HomeController::class, 'cancelOrder'])->name('order.cancelOrder');

    });

    // authentication guard Customers
    Route::get('/login', [LoginController::class, 'login'])->middleware('guest:customers')->name('login');

    Route::post('/login', [LoginController::class, 'postLogin'])->middleware('guest:customers');

    // Đăng ký
    Route::get('/register', [RegisterController::class, 'index'])->name('register');

    Route::post('register', [RegisterController::class, 'postRegister'])->name('postRegister');

    // logout
    Route::post('/logout', function () {
        Auth::guard('customers')->logout();
        return redirect(route('store.login'));
    })->middleware('auth:customers')->name('logout');

    // Xử lý quên mật khẩu
    Route::get('password/forgot', [CustomerForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot');
    Route::post('password/email', [CustomerForgotPasswordController::class, 'sendResetLinkEmail'])->name('sendEmail.forgot');
});
