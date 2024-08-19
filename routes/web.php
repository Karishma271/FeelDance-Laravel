<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ClassController as UserClassController;
use App\Http\Controllers\User\ClassMemberController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClassController as AdminClassController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\AllocationController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;

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

// User-side routes (public-facing)
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/classes', [UserClassController::class, 'index'])->name('classes.index');
Route::get('/classmember', [ClassMemberController::class, 'index'])->name('classmember.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


// Admin login routes
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'login']);
Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Admin dashboard route
Route::middleware(['auth:admin'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
  

    // Class management routes
    Route::resource('admin/classes', AdminClassController::class, ['as' => 'admin']);

    // Member management routes
    Route::resource('admin/members', MemberController::class, ['as' => 'admin']);

    // Allocation management routes
    Route::get('admin/allocations', [AllocationController::class, 'index'])->name('admin.allocations.index');
    Route::get('admin/allocations/create', [AllocationController::class, 'create'])->name('admin.allocations.create');
    Route::post('admin/allocations', [AllocationController::class, 'store'])->name('admin.allocations.store');
    Route::get('admin/allocations/{id}/edit', [AllocationController::class, 'edit'])->name('admin.allocations.edit');
    Route::put('admin/allocations/{id}', [AllocationController::class, 'update'])->name('admin.allocations.update');
    Route::delete('admin/allocations/{id}', [AllocationController::class, 'destroy'])->name('admin.allocations.destroy');
});

