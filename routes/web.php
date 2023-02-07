<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// Route::get('/', function () { return view('welcome'); });

Route::middleware(['xss'])->group(function () {
    Route::name('fe.')->group(function () {
        Route::controller(App\Http\Controllers\FrontendController::class)->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/list', 'list')->name('list');
            Route::middleware(['auth'])->group(function () {
                Route::get('/category/{id}', 'category')->name('category');
                Route::get('/review', 'review')->name('review');

                Route::middleware(['auth'])->group(function () {
                    Route::controller(App\Http\Controllers\AddressController::class)->group(function () {
                        Route::get('/alamat', 'alamat')->name('alamat');
                        Route::post('/post_alamat', 'post_alamat')->name('post_alamat');
                        Route::put('/update_alamat', 'update_alamat')->name('update_alamat');
                        Route::delete('/delete_alamat', 'delete_alamat')->name('delete_alamat');
                        Route::put('/set_alamat', 'set_alamat')->name('set_alamat');
                        Route::put('/update_address/{id}', 'update_address')->name('update_address');
                    });
                    Route::controller(App\Http\Controllers\CateringController::class)->group(function () {
                        Route::get('/catering', 'catering')->name('catering');
                        Route::get('/resto-catering', 'resto_catering')->name('resto_catering');
                        Route::get('/cart-catering', 'cart_catering')->name('cart_catering');
                        Route::post('/post_catering', 'post_catering')->name('post_catering');
                        Route::put('/update_catering', 'update_catering')->name('update_catering');
                    });
                    Route::controller(App\Http\Controllers\InstantController::class)->group(function () {
                        Route::get('/instan', 'instan')->name('instan');
                        Route::get('/resto-instan', 'resto_instan')->name('resto_instan');
                        Route::get('/cart-instan', 'cart_instan')->name('cart_instan');
                    });
                    Route::middleware(['alamat'])->group(function () {
                        Route::get('/akun', 'akun')->name('akun');
                        Route::put('/akun', 'update_akun')->name('update_akun');
                        Route::get('/password', 'password')->name('password');
                        Route::put('/password', 'update_password')->name('update_password');
                        Route::get('/riwayat', 'riwayat')->name('riwayat');
                        Route::get('/bantuan', 'bantuan')->name('bantuan');

                        Route::post('/cart', 'post_cart')->name('post_cart');
                        Route::put('/minus/{id}', 'minus')->name('minus');
                        Route::put('/plus/{id}', 'plus')->name('plus');
                        Route::put('/cart/{id}', 'update_cart')->name('update_cart');
                        Route::delete('/cart/delete/{id}', 'delete_cart')->name('delete_cart');
                        Route::put('/update_note/{id}', 'update_note')->name('update_note');
                        Route::put('/pay/{id}', 'pay')->name('pay');
                        Route::get('/invoice/{id}', 'invoice')->name('invoice');

                        Route::resource('orders', App\Http\Controllers\OrderController::class)->only(['index', 'show']);
                        Route::post('payments/midtrans-notification', [App\Http\Controllers\PaymentCallbackController::class, 'receive']);
                    });
                });
            });
        });
    });

    Auth::routes([
        'login'    => true,
        'logout'   => true,
        'register' => true,
        'reset'    => false,  // for resetting passwords
        'confirm'  => false,  // for additional password confirmations
        'verify'   => false,  // for email verification
    ]);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
        Route::controller(App\Http\Controllers\ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
            Route::get('/', 'edit')->name('edit');
            Route::put('/', 'update')->name('update');
            Route::post('upload', 'upload')->name('upload');
            Route::put('password', 'password')->name('password');
        });

        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
        Route::resource('transactions', App\Http\Controllers\Admin\TransactionController::class);
        Route::resource('order_products', App\Http\Controllers\Admin\OrderProductController::class);
        Route::resource('transactions_instant', App\Http\Controllers\Admin\InstantController::class);
        Route::resource('transactions_catering', App\Http\Controllers\Admin\CateringController::class);
        Route::resource('riwayat', App\Http\Controllers\Admin\RiwayatController::class);
        Route::controller(App\Http\Controllers\Admin\TransactionController::class)->name('transactions.')->group(function () {
            Route::get('/status/{id}', 'status')->name('status');
            Route::put('/status/{id}', 'status_update')->name('status_update');
        });

        Route::resource('roles', App\Http\Controllers\Admin\RoleController::class);
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);

        Route::controller(App\Http\Controllers\Admin\SettingWebsiteController::class)->prefix('setting')->name('setting.')->group(function () {
            Route::get('website', 'index')->name('index');
            Route::put('website/{admin_website}', 'update')->name('update');
        });

        Route::get('/clear', function () {
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('config:cache');
            Artisan::call('view:clear');
            Artisan::call('optimize');

            return redirect()->back()->with('success', 'Cleared!');
        })->name('clear');
    });
});
