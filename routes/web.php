<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\User;

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
    return view('welcome');
});

Route::get('/home', function () {
    echo "This is the home page";
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/contactfafdfaff-fdsfaf-fafd', [ContactController::class, 'index'])->name('cont');

Route::get('/category/all',[CategoryController::class, 'allCat'])->name('all.category');
Route::post('/category/add',[CategoryController::class, 'addCat'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class, 'Edit'])->name('edit.category');
Route::post('/category/update/{id}',[CategoryController::class, 'Update'])->name('update.category');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    $users = User::all();
    $users = DB::table('users')->get();
    return view('dashboard', compact('users'));
})->name('dashboard');
