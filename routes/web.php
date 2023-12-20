<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dshboard\AdminDashboardController;
use App\Http\Controllers\Dashboar\Admin\Story\ShowStoryController;
use App\Http\Controllers\Dashboard\Admin\Writershistory\ShowWriterHistoryControler;

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
##story
    Route::get('/story', function () {
        return view('dashboard.story.index');
    })->name('story');

    Route::get('show-story/{id}',[ShowStoryController::class,'index'])->name('show-story');
    ##writers history
    Route::get('/writers', function () {
        return view('dashboard.writershistory.index');
    })->name('writers');

    Route::get('show-writer/{id}',[ShowWriterHistoryControler::class,'index'])->name('show-writer');

});