<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['cors', 'json.response']], function () {
    Route::controller(App\Http\Controllers\Api\FrontendController::class)->group(function () {
        Route::get('/list', 'list')->name('list');
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('midtrans-notify', [App\Http\Controllers\FrontendController::class, 'midtrans_notify'])->name('midtrans_notify');
Route::put('midtrans-pay', [App\Http\Controllers\FrontendController::class, 'midtrans_pays'])->name('midtrans_pays');
