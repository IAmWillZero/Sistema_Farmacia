<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Ruta por defecto
Route::get('/', function () {
    return view('welcome'); // Ajusta la vista según la estructura de tu proyecto
});

// Rutas de autenticación
Auth::routes();

// Rutas del home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas para el administrador
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Usuarios
    Route::prefix('users')->name('admin.users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [UserController::class, 'destroy'])->name('delete');
        Route::get('/{id}/profile', [UserController::class, 'showProfile'])->name('profile');
    });

    // Productos
    Route::prefix('products')->name('admin.products.')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::put('/{id}/update', [ProductController::class, 'update'])->name('update');
        Route::delete('/{id}/delete', [ProductController::class, 'destroy'])->name('delete');
        Route::get('/{id}/details', [ProductController::class, 'showDetails'])->name('details');
    });

    // Proveedores
    Route::get('/proveedores', [ProviderController::class, 'index'])->name('admin.proveedores');

    // Clientes
    Route::get('/clientes', [ClientController::class, 'index'])->name('admin.clientes');

    // Reportes
    Route::prefix('reportes')->name('admin.reportes.')->group(function () {
        Route::get('/ventas', [ReportController::class, 'ventas'])->name('ventas');
        Route::get('/inventario', [ReportController::class, 'inventario'])->name('inventario');
    });

    // Configuración
    Route::prefix('configuracion')->name('admin.configuracion.')->group(function () {
        Route::get('/empresa', [ConfigController::class, 'empresa'])->name('empresa');
        Route::get('/usuarios', [ConfigController::class, 'usuarios'])->name('usuarios');
    });

    // Inventario
    Route::get('/inventario', [InventoryController::class, 'index'])->name('admin.inventario');
    Route::get('/agregar-producto', [InventoryController::class, 'create'])->name('admin.agregarProducto');
});

// Rutas para vendedor
Route::middleware(['auth', 'role:seller'])->prefix('seller')->group(function () {
    Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');

    // Ruta para ventas (seller.ventas)
    Route::prefix('ventas')->name('seller.ventas.')->group(function () {
        Route::get('/', [SaleController::class, 'index'])->name('index'); // Ruta para mostrar todas las ventas
        Route::get('/create', [SaleController::class, 'create'])->name('create'); // Ruta para crear una venta
        Route::get('/{id}/edit', [SaleController::class, 'edit'])->name('edit'); // Ruta para editar una venta
        Route::get('/{id}', [SaleController::class, 'show'])->name('show'); // Ruta para ver detalles de una venta
    });

    // Otras rutas del vendedor...
});

// Ruta de logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Rutas de registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
