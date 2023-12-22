<?php

use App\Http\Controllers\Dashboard\Admin\AdminDashboardController as AdminAdminDashboardController;
use App\Http\Controllers\Dashboard\Admin\History\ShowHistoryController;
use App\Http\Controllers\Dashboard\Admin\Story\ShowStoryController;
use App\Http\Controllers\Dashboard\Admin\Writershistory\ShowWriterHistoryControler;
use App\Http\Controllers\Dshboard\AdminDashboardController;
use App\Http\Controllers\website\StoryController;
use App\Http\Controllers\website\SurveyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
historical-writer
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
##################### أدباء عبر التاريخ#############ShowHistoricalwriterController###########
    Route::get('/HistoricalWriter', function () {
        return view('dashboard.HistoricalWriter.index');
    })->name('HistoricalWriter');

    Route::get('show-HistoricalWriter/{id}',[ShowHistoryController::class,'index'])->name('show-HistoricalWriter');
    ##############################
    ##writers history
    Route::get('/writers', function () {
        return view('dashboard.writershistory.index');
    })->name('writers');

    Route::get('show-writer/{id}',[ShowWriterHistoryControler::class,'index'])->name('show-writer');

    ##survey history
    Route::get('/surveys', function () {
        return view('dashboard.surveys.index');
    })->name('surveys');
});


#################################################################superVisor ###########################################################


Route::group(  ['prefix' => 'supervisor','as'=>'supervisor.','middleware' => ['auth','role:supervisor']], function () {
    Route::get('start',function(){
        return view('website.story.index');
    })->name('index');
    Route::resource('story', StoryController::class)->only(['index', 'store']);

    Route::get('story/thank-you', function () {
        return view('website.survey.success');
    })->name('story.thank-you');
});

Route::group(  ['prefix' => 'users','as'=>'users.'], function () {
    Route::resource('survey', SurveyController::class)->only(['index', 'store']);

    Route::get('survey/thank-you', function () {
        return view('website.survey.success');
    })->name('survey.thank-you');
});