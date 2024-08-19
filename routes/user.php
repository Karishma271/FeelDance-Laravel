<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ClassMemberController;
use App\Http\Controllers\User\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('user.home');

Route::resource('classes', ClassMemberController::class);
Route::resource('contact', ContactController::class);
