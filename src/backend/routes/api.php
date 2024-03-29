<?php

use App\Packages\Presentations\Controllers\CustomerController;
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

Route::middleware('auth:sanctum')->group(function () {
    /** 認証済みユーザを取得 */
    Route::get('/me', function (Request $request) {
        return $request->user();
    });

    /** 顧客一覧を取得 */
    Route::get('/customers', [CustomerController::class, 'index']);
});
