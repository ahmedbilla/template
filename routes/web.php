<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EDocController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::resource('/users',UserController::class);
Route::resource('/roles',RoleController::class);
Route::resource('/permissions', PermissionController::class);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::middleware(['auth' , 'role:admin'])->group(function () {
    Route::middleware(['auth' , ])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});


require __DIR__.'/auth.php';


Route::inertia('/products', 'Admin/Products/Products');
Route::inertia('/addproduct', 'Admin/Products/AddProduct');
Route::inertia('/inbox', 'Admin/Inbox');
Route::inertia('/admindashboard', 'Admin/Dashboard');
Route::inertia('/settings', 'Admin/Settings/Settings');
Route::inertia('/settings/theme', 'Admin/Settings/Theme');
Route::resource('/settings/edocs', EDocController::class);
Route::resource('/settings/general', SettingsController::class);
