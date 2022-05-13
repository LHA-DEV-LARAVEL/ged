<?php

use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;

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
})->name('home');
Route::get('/portfolio', function () {
    return view('portfolio');
})->name('portfolio');
Route::get('/services', function () {
    return view('services');
})->name('services');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin/categories', [CategorieController::class, 'index'])->middleware(['auth', 'admin'])->name('categories.index');

Route::get('/admin/categorie', [CategorieController::class, 'create'])->middleware(['auth', 'admin'])->name('categories.create');

Route::post('/admin/categorie', [CategorieController::class, 'store'])->middleware(['auth', 'admin'])->name('categories.store');

Route::get('/admin/categorie/{categorie}', [CategorieController::class, 'show'])->middleware(['auth', 'admin'])->name('categories.show');

Route::get('/admin/categorie/{categorie}/edit', [CategorieController::class, 'edit'])->middleware(['auth', 'admin'])->name('categories.edit');

Route::put('/admin/categorie/{categorie}', [CategorieController::class, 'update'])->middleware(['auth', 'admin'])->name('categories.update');

Route::delete('/admin/categorie/{categorie}', [CategorieController::class, 'destroy'])->middleware(['auth', 'admin'])->name('categories.delete');

require __DIR__.'/auth.php';
