<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\users\UserController;
use App\Http\Controllers\users\LoginController;
use App\Http\Middleware\Member;
use App\Http\Middleware\AuthenticateUser;

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

// non-logged users home page
Route::get('/', [UserController::class, 'index'])->name('user.non_logged.index');
// user register
Route::get('/user/register', [LoginController::class, 'reg'])->middleware('authentic_user')->name('user.register');
Route::post('/user/register/create', [LoginController::class, 'reg_create'])->name('user.register.create');

// user register
Route::get('/user/login', [LoginController::class, 'login'])->middleware('authentic_user')->name('user.login');
Route::post('/user/login/create', [LoginController::class, 'login_create'])->name('user.login.create');

Route::get('/user/logout', [LoginController::class, 'log_out'])->name('user.log_out');

// after logged in user first show this page
Route::get('/user/home', [UserController::class, 'home'])->middleware('member')->name('user.home');
// start quiz
Route::get('/user/show_quiz', [UserController::class, 'show_quiz'])->middleware('member')->name('user.show_quiz');
// add quiz for logged in users
Route::get('/user/add_quiz', [UserController::class, 'add_quiz'])->middleware('member')->name('user.add_quiz');
Route::post('/user/quiz/create', [UserController::class, 'quiz_create'])->name('user.quiz.create');
// show user uiz result
Route::get('/user/result', [UserController::class, 'quiz_result'])->middleware('member')->name('user.result');
Route::post('/user/quiz/result/create', [UserController::class, 'quiz_result_create'])->name('user.quiz.result.create');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
