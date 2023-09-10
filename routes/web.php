<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/dash', [DashboardController::class, 'index']);
});



Route::get('/dash', [DashboardController::class, 'index'])
->middleware(['auth', 'verified'])->name('dash');






Route::get('/admin/dashboard',[DashboardController::class, 'index'])
->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

//////////////////
Route::group(['middleware' => 'auth:teacher'], function () {
    Route::get('/dash', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dash');
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/dash', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dash');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// ---------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------
Route::middleware(['auth', 'user-access:user'])->group(function () {

//     Route::get('/home', [HomeController::class, 'index'])->name('home');
// });

// /*------------------------------------------
// --------------------------------------------
// All Admin Routes List
// --------------------------------------------
// --------------------------------------------*/
// Route::middleware(['auth', 'user-access:admin'])->group(function () {

//     Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
// });

// /*------------------------------------------
// --------------------------------------------
// All Admin Routes List
// --------------------------------------------
// --------------------------------------------*/
// Route::middleware(['auth', 'user-access:manager'])->group(function () {

//     Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
// });

// ---------------------------------------------------------------
// ---------------------------------------------------------------

Route::get('/home', [DashboardController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [DashboardController::class, 'index'])->name('admin.home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:teacher'])->group(function () {

    Route::get('/teacher/home', [DashboardController::class, 'index'])->name('teacher.home');
});
Auth::routes();




require __DIR__.'/dashboard.php';
