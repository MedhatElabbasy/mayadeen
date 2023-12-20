<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dshboard\AdminDashboardController;
use App\Http\Controllers\Dashboar\Admin\Historical_writers\ShowHistorical_writerController;

use App\Http\Controllers\Dashboar\Admin\Story\ShowStoryController;
use App\Http\Controllers\Dashboard\Admin\Writershistory\ShowWriterHistoryControler;
use App\Http\Controllers\Dashboard\Admin\AdminDashboardController as AdminAdminDashboardController;

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
    return view('auth.login');
});

Auth::routes(['register' => false]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/{page}', [AdminAdminDashboardController::class,'index']);
##AdminDashboard
Route::group(  ['prefix' => 'admin/dashboard','as'=>'admin.dashboard.','middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('index');
##story
    Route::get('/story', function () {
        return view('dashboard.story.index');
    })->name('story');
    
    Route::get('show-story/{id}',[ShowStoryController::class,'index'])->name('show-story');

    Route::get('/HistoricalWriter', function () {
        return view('dashboard.HistoricalWriter.index');
    })->name('HistoricalWriter');
    Route::get('show-HistoricalWriter/{id}',[ShowHistorical_writerController::class,'index'])->name('show-story');
    ##writers history
    Route::get('/writers', function () {
        return view('dashboard.writershistory.index');
    })->name('writers');

    Route::get('show-writer/{id}',[ShowWriterHistoryControler::class,'index'])->name('show-writer');

});