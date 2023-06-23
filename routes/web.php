<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tshirt_imagesController;
use App\Http\Controllers\Order_itemsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ColorsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarrinhoController;

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
    return view('layout');
});


//Customers
Route::get('customers',  [CustomersController::class, 'index'])->name('customers.index');

//Order_items
Route::get('order_items',  [Order_itemsController::class, 'index'])->name('order_items.index');

//Tshirt_images
Route::get('tshirt_images',  [Tshirt_imagesController::class, 'index'])->name('tshirt_images.index');
Route::get('/tshirt_images/search', [Tshirt_imagesController::class, 'search'])->name('tshirt_images.search');

//Colors
Route::get('colors',  [ColorsController::class, 'index'])->name('colors.index');

//Users
Route::get('users',  [UsersController::class, 'index'])->name('users.index');
Route::get('users/create',  [UsersController::class, 'create'])->name('users.create');
Route::post('users/store',  [UsersController::class, 'store'])->name('users.store');
Route::get('users/{user}/edit',  [UsersController::class, 'edit'])->name('users.edit');
Route::put('users/{user}',  [UsersController::class, 'update'])->name('users.update');
Route::delete('users/{user}',  [UsersController::class, 'destroy'])->name('users.destroy');
Route::get('users/{user}',  [UsersController::class, 'show'])->name('users.show');

//Carrinho
Route::get('carrinho',  [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::post('carrinho/adicionar', [CarrinhoController::class, 'adicionar'])->name('carrinho.adicionar');
Route::delete('carrinho/{order_item}',  [CarrinhoController::class, 'remove'])->name('carrinho.remove');
Route::post('carrinho/confirmar-compra' , [CarrinhoController::class, 'confirmarCompra'])->name('carrinho.confirmar-compra');
Route::delete('carrinho' , [CarrinhoController::class, 'destroy'])->name('carrinho.destroy');
Route::post('carrinho/remover/{tshirtId}', [CarrinhoController::class, 'remover'])->name('carrinho.remover');




Auth::routes();

//Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::view('teste', 'template.layout');
