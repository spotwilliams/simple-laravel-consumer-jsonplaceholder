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

use App\Http\Controllers\Posts\ListCommentsOfPost;
use App\Http\Controllers\Posts\ListPostController;
use App\Http\Controllers\Posts\CreatePostController;
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


Route::get('/posts', ListPostController::class)->name('posts.list');
Route::get('/posts/{id}/comments', ListCommentsOfPost::class)->name('posts.comments');
Route::post('/posts', CreatePostController::class)->name('posts.create');
