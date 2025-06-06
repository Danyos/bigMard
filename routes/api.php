<?php

use App\Http\Controllers\api\ProjectController;
use App\Http\Controllers\api\TaskController;
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

Route::get('/projects/index', [ProjectController::class, 'index']);
Route::post('/projects/store', [ProjectController::class, 'store']);
Route::get('/projects/show/{project}', [ProjectController::class, 'show']);
Route::put('/projects/update/{project}', [ProjectController::class, 'update']);
Route::patch('/projects/update/{project}', [ProjectController::class, 'update']);
Route::delete('/projects/delete/{project}', [ProjectController::class, 'destroy']);

// Tasks routes
Route::get('/tasks/index', [TaskController::class, 'index']);
Route::post('/tasks/store', [TaskController::class, 'store']);
Route::get('/tasks/show/{task}', [TaskController::class, 'show']);
Route::put('/tasks/update/{task}', [TaskController::class, 'update']);
Route::patch('/tasks/update/{task}', [TaskController::class, 'update']);
Route::delete('/tasks/delete/{task}', [TaskController::class, 'destroy']);



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


