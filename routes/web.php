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

Auth::routes(['register' => false]);

Route::get('/', 'ListingController@index')->name('home');
Route::resource('listings', 'ListingController');
Route::post('/', 'ListingController@index');

Route::middleware(['auth'])->group(function () {
    Route::get('/approvals', 'ListingApprovalController@index');
    Route::post('/approvals/{listing}', 'ListingApprovalController@store');

    Route::resource('categories', 'CategoryController')->middleware('can:update,App\Category');
});
