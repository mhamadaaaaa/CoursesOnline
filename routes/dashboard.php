<?php

use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\CourseActive;
use App\Http\Controllers\Dashboard\coursesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\videoController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/dash', [DashboardController::class, 'index'])
->middleware(['auth', 'verified'])->name('dash');

/////////////////////////////////////////////////////
Route::get('/category/trash', [CategoriesController::class, 'trash'])->name('category.trash');
Route::put('category/{category}/restore', [CategoriesController::class, 'restore'])
    ->name('category.restore');
Route::delete('category/{category}/force-deleate', [CategoriesController::class, 'forcedeleate'])
    ->name('category.forcedeleate');
Route::resource('category', CategoriesController::class);
///////////////////////////////////////////////////
Route::get('/course/trash', [coursesController::class, 'trash'])->name('course.trash');
Route::put('course/{course}/restore', [coursesController::class, 'restore'])
    ->name('course.restore');

Route::delete('course/{course}/force-deleate', [coursesController::class, 'forcedeleate'])
    ->name('course.forcedeleate');
Route::resource('course', coursesController::class);
//////////////////////////////////////////////////
Route::resource('video', videoController::class);
//////////////////////////////////////////////////
Route::resource('activecourse',CourseActive ::class);

?>
