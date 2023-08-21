<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\frontend\DeleteController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\SettingsController;
use App\Http\Controllers\frontend\SharedController;
use App\Http\Controllers\frontend\StarredController;
use App\Http\Controllers\frontend\WritingController;
use Illuminate\Console\View\Components\Warn;

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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::middleware(['guest'])->group(function(){

    Route::get('/login',[LoginController::class,'loginView'])->name('login');

    Route::get('/register',[RegisterController::class,'registerView'])->name('register');

});

Route::post('/store',[RegisterController::class,'store']);


Route::post('/authenticate',[LoginController::class,'authenticates']);


Route::middleware(['auth'])->group(function(){

    Route::get('/',[FrontendController::class,'index']);

    Route::get('/writing',[WritingController::class,'index']);

    Route::get('/logout',[LoginController::class,'logout']);

    Route::post('/deleteContent',[FrontendController::class,'delete']);

    Route::post('/starredItem',[FrontendController::class,'starred']);

    Route::post('/gmailGet',[FrontendController::class,'getGmail']);

    Route::get('/trash',[DeleteController::class,'index']);

    Route::post('/restore',[DeleteController::class,'restore']);

    Route::post('/deleted',[DeleteController::class,'permanentDeleted']);

    Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);

    Route::get('/starredContents',[StarredController::class,'index']);

    Route::get('/share',[SharedController::class,'index']);

    Route::get('/settings',[SettingsController::class,'index']);

    Route::post('/shareContent',[SharedController::class,'shareStore']);

    Route::post('/contentStore',[WritingController::class,'Writingstore']);

    Route::get('/editContent/{id}',[WritingController::class,'editContent']);

    Route::put('/update/{id}',[WritingController::class,'updateContent']);

    Route::get('journal-list',[FrontendController::class,'journalListUsingAjax']);

    Route::post('search-journal',[FrontendController::class,'searchJournal']);

    Route::get('/email/verify',[RegisterController::class,'emailVerification']);

    Route::post('restoreAll',[FrontendController::class,'restoreAll']);

    Route::post('deleteAll',[DeleteController::class,'deleteAll']);

    Route::put('/userUpdate',[UserController::class,'userUpdate']);

    Route::post('/showContent',[FrontendController::class,'showContent']);




});




Route::get('auth/google/callback', [LoginController::class,'handleGoogleCallback']);

Route::get('/forgot-password',[ForgotPasswordController::class,"showForgotPasswordForm"])->name('forgot.password.get');

Route::post('/forgot-password',[ForgotPasswordController::class,"submitForgetPasswordForm"])->name('forgot.password.post');

Route::get('reset-password/{token}',[ForgotPasswordController::class,"showResetPasswordForm"])->name('reset.password.get');

Route::get('email-verify/{token}',[RegisterController::class,"emailVerify"])->name('email.verify.get');


Route::post('reset-password',[ForgotPasswordController::class,"submitResetPasswordForm"])->name('reset.password.post');
