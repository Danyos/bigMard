<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/clear', function() {
    $exitCode = \Artisan::call('config:cache');
    $exitCode = \Artisan::call('cache:clear');
    $exitCode = \Artisan::call('route:cache');

    return 'Routes cache cleared';
});
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('Homeindex');
Route::get('/privacy-policy', [App\Http\Controllers\WelcomeController::class, 'policy'])->name('privacy.policy');
Route::get('/guarantee', [App\Http\Controllers\WelcomeController::class, 'guarantee'])->name('privacy.guarantee');
Route::get('/payments', [App\Http\Controllers\WelcomeController::class, 'payments'])->name('privacy.payments');
Route::get('/delivery', [App\Http\Controllers\WelcomeController::class, 'delivery'])->name('privacy.delivery');
Route::get('/item/{slug}', [App\Http\Controllers\WelcomeController::class, 'show'])->name('item.show');
Route::get('/popup/{slug}', [App\Http\Controllers\WelcomeController::class, 'popup'])->name('item.popup');
Route::post('/feedback', [App\Http\Controllers\WelcomeController::class, 'feedback'])->name('item.feedback');
Route::post('/formregister', [App\Http\Controllers\WelcomeController::class, 'register'])->name('item.reg');



//Auth::routes(['register' => false, 'reset' => false,'login' => 'signin']);
Route::get('/signin', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/signin', 'App\Http\Controllers\Auth\LoginController@login');
Route::redirect('home','/admin/home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/product', App\Http\Controllers\Admin\ProductController::class );
    Route::resource('/callUp', App\Http\Controllers\Admin\CallUpCenterRequestController::class );
    Route::resource('/reviews', App\Http\Controllers\Admin\ReviewRequestController::class );
    Route::resource('/category', App\Http\Controllers\Admin\CategoryController::class );
    Route::delete('/delete/product/images', [App\Http\Controllers\Admin\ProductController::class,'deleteImages'] )->name('deleteImages');
    Route::get('/items/setInActive/{id}', [App\Http\Controllers\Admin\ProductController::class, 'setInActive'])->name('items.setInactive');

    Route::get('/items/{id}/setActive', [App\Http\Controllers\Admin\ProductController::class, 'showSetActiveForm'])->name('items.setActive');
    Route::post('/items/{id}/setActive', [App\Http\Controllers\Admin\ProductController::class, 'setActive'])->name('items.set-active.post');

    Route::get('/change-password', [\App\Http\Controllers\Admin\user\ChangePasswordController::class, 'showChangePasswordForm'])->name('change.password');
    Route::post('/change-password', [\App\Http\Controllers\Admin\user\ChangePasswordController::class, 'changePassword'])->name('change.password.post');



});
