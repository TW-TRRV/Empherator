<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/catalogo', [ProductController::class, 'index'])->name('catalogo');

use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');



use Illuminate\Http\Request;
Route::post('/cart/add/{id}', function (Request $request, $id) {
    // Lógica básica para agregar al carrito (usando sesión para simplicidad)
    $cart = session()->get('cart', []);
    $cart[] = ['id' => $id, 'quantity' => 1]; // Simplificado, agregar lógica real después
    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Producto agregado al carrito');
})->name('cart.add');



Route::get('/cart', [CartController::class, 'index'])->name('cart.index');