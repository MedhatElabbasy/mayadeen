<?php

use App\Http\Controllers\Dshboard\AdminDashboardController;
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

Route::get('/', function () {
    return view('welcome');
});




Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/{page}', [AdminDashboardController::class,'index']);
##AdminDashboard
Route::group(  ['prefix' => 'admin/dashboard','as'=>'admin.dashboard.'], function () {

    Route::get('/story', function () {
        return view('dashboard.story.index');
    })->name('story');
});