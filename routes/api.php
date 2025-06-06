<?php

use App\Models\Product\ItemDetailsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::get('/test/for/ani', [\App\Http\Controllers\api\ProductInformationController::class, 'ani']);
Route::get('/test/for/daniel', [\App\Http\Controllers\api\ProductInformationController::class, 'daniel']);
Route::get('/test/for/test', [\App\Http\Controllers\api\ProductInformationController::class, 'test']);
Route::get('/test/for/access', [\App\Http\Controllers\api\ProductInformationController::class, 'access']);
Route::apiResource('projects', \App\Http\Controllers\api\ProjectModelController::class);
Route::apiResource('tasks', \App\Http\Controllers\api\TaskModelController::class);
Route::middleware('auth.api.key')->group(function () {
    Route::get('/block', [\App\Http\Controllers\api\PageStatusController::class, 'update']);
    Route::get('/info', [\App\Http\Controllers\api\ProductInformationController::class, 'cat']);
    Route::post('/order/product', [\App\Http\Controllers\api\ProductInformationController::class, 'order']);
    Route::post('/feedback/product', [\App\Http\Controllers\api\ProductInformationController::class, 'feedback']);
    Route::get('/product/details/{id}', [\App\Http\Controllers\api\ProductInformationController::class, 'details']);
    Route::get('/additional/details/{id}', [\App\Http\Controllers\api\ProductInformationController::class, 'additional']);
    Route::get('/product/reviews/{id}', [\App\Http\Controllers\api\ProductInformationController::class, 'detailsReviews']);
    Route::get('/product/images/{id}', [\App\Http\Controllers\api\ProductInformationController::class, 'detailsImages']);
    Route::get('/product/item/details/{id}', [\App\Http\Controllers\api\ProductInformationController::class, 'itemDetails']);
});


