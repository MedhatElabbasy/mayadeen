<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dshboard\AdminDashboardController;
use App\Http\Controllers\Dashboar\Admin\Historical_writers\ShowHistorical_writerController;

use App\Http\Controllers\Dashboar\Admin\Story\ShowStoryController;

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
    
    Route::get('show-story/{id}',[ShowStoryController::class,'index'])->name('show-story');

    Route::get('/HistoricalWriter', function () {
        return view('dashboard.HistoricalWriter.index');
    })->name('HistoricalWriter');
    Route::get('show-HistoricalWriter/{id}',[ShowHistorical_writerController::class,'index'])->name('show-story');

});