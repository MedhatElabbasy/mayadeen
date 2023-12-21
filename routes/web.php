<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dshboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\Admin\Story\ShowStoryController;
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



Auth::routes(['register' => false]);

Route::get('/', function () {
    return view('dashboard.signin');
})->name('defult.login');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/{page}', [AdminAdminDashboardController::class,'index']);
#################################################################AdminDashboard###########################################################
Route::group(  ['prefix' => 'admin/dashboard','as'=>'admin.dashboard.','middleware' => ['auth','role:admin']], function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('index');
    ##story
    Route::get('/story', function () {
        return view('dashboard.story.index');
    })->name('story');

    Route::get('show-story/{id}',[ShowStoryController::class,'index'])->name('show-story');
    // dowload story pdf
    Route::get('/download-pdf/{id}', [ShowStoryController::class, 'downloadPDF'])->name('story-download-pdf');
    ##writers history
    Route::get('/writers', function () {
        return view('dashboard.writershistory.index');
    })->name('writers');

    Route::get('show-writer/{id}',[ShowWriterHistoryControler::class,'index'])->name('show-writer');

});


#################################################################superVisor ###########################################################


Route::group(  ['prefix' => 'superVisor','as'=>'superVisor.','middleware' => ['auth','role:supervisor']], function () {
    Route::get('/supervisor', function () {
        return view('super_visor.index');
    })->name('index');

    Route::get('/title',function(){
        return view('super_visor.story.title');
    })->name('title');
});