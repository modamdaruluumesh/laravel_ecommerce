<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\OrderController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    // removed 'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// removed 'verified' here too
Route::get('redirect', [HomeController::class, 'redirect'])->middleware('auth');

// welcome page
Route::get('/', [HomeController::class, 'index']);

Route::get('/view_catagory', [AdminController::class, 'view_catagory']);
Route::post('/add_catagory', [AdminController::class, 'add_catagory']);
Route::get('/delete_catagory/{id}', [AdminController::class, 'delete_catagory']);

Route::get('/view_products', [AdminController::class, 'view_products']);
Route::post('/add_product', [AdminController::class, 'add_product']);
Route::get('/show_products', [AdminController::class, 'show_products']);
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);
Route::get('/update_product/{id}', [AdminController::class, 'update_product']);
Route::post('/update_product_confirm/{id}', [AdminController::class, 'update_product_confirm']);

Route::get('/order', [AdminController::class, 'order']);
Route::post('/order/update-status/{id}', [AdminController::class, 'updateOrderStatus'])->name('order.updateStatus');
Route::get('/order/invoice/{id}', [AdminController::class, 'downloadOrderInvoice'])->name('order.downloadInvoice');
Route::get('/order/send-email/{id}', [AdminController::class, 'showSendEmailForm'])->name('order.showSendEmailForm');
Route::post('/order/send-mail/{id}', [AdminController::class, 'sendOrderMail'])->name('order.sendMail');

Route::get('/search', [AdminController::class, 'searchdata']);

Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);
Route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart');
Route::post('/remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove_cart');
Route::get('/cash_order', [HomeController::class, 'cash_order']);
Route::get('/checkout', [HomeController::class, 'checkout']);
Route::post('/place_order', [HomeController::class, 'place_order'])->name('place_order');

Route::get('/show_order', [HomeController::class, 'show_order']);
Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);
