<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\AuthorsController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
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

 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/',[FrontendController::class , 'home'])->name('frontend.home');
Route::get('/books/{book}',[FrontendController::class , 'showDetail'])->name('frontend.book.detail');
 
Route::middleware('auth')->prefix('cart')->name('cart.')->group(function ()
{
    Route::post('/{book}',[CartController::class,'addTocart'])->name('addToCart');
    Route::get('/',[CartController::class,'getCart'])->name('getCart');
    Route::delete('/{id}',[CartController::class,'removeItem'])->name('removeItem');
});

Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::resource('/authors',AuthorsController::class);
    Route::resource('/books',BooksController::class);
});

require __DIR__.'/auth.php';
