<?php

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

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Posts\DeletePostController;
use App\Http\Controllers\Posts\ViewPostController;
use App\Http\Controllers\Posts\ListPostController;
use App\Http\Controllers\Posts\CreatePostController;
use App\Http\Controllers\Posts\UpdatePostController;
use App\Http\Controllers\Comments\CreateCommentController;
use Illuminate\Support\Facades\Route;

Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');
Route::get('email/verify', 'App\Http\Controllers\Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'App\Http\Controllers\Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'App\Http\Controllers\Auth\VerificationController@resend')->name('verification.resend');

Route::get('/', HomeController::class)->name('home');

Route::get('/posts', ListPostController::class)->name('posts.list');
Route::post('/posts', CreatePostController::class)->name('posts.create');
Route::put('/posts/{id}', UpdatePostController::class)->name('posts.update');
Route::delete('/posts/{id}', DeletePostController::class)->name('posts.delete');
Route::get('/posts/{id}', ViewPostController::class)->name('posts.view');

Route::post('/comments', CreateCommentController::class)->name('comments.create');
