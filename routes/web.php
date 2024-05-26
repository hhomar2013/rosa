<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\CategoriesComponnent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['register'=>false]);


Route::get('/admin',[LoginController::class,'showAdminLoginForm'])->name('admin.login-view');
Route::post('/admin',[LoginController::class,'adminLogin'])->name('admin.login');

Route::get('/admin/register',[RegisterController::class,'showAdminRegisterForm'])->name('admin.register-view');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');
Route::post('/admin/register',[RegisterController::class,'createAdmin'])->name('admin.register');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// ->middleware('auth:admin')
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    //HomePage
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('/settings/categories',[AdminController::class,'category'])->name('categories');
    Route::get('/settings/employee',[AdminController::class,'employee'])->name('employee');
    Route::get('/settings/bank',[AdminController::class,'bank'])->name('bank');

    Route::resource('/settings/roles', RoleController::class);
    Route::resource('/settings/users', UserController::class);

    //pos
    Route::get('/pos',[AdminController::class,'pos'])->name('pos');

    // Route::POST('/logout-admin',[LoginController::class,'admin_logout'])->name('admin.logout');
})->name('admin.');




