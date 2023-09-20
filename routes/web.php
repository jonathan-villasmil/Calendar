<?php

use App\Http\Controllers\Admin\UserController;
use Dotenv\Store\File\Paths;
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

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    //Route::resource('admin/users', UserController::class);

    // Rutas para mostrar la lista de usuarios (index) y el formulario para crear un nuevo usuario
    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');

    // Ruta para almacenar un nuevo usuario en la base de datos (store)
    Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');

    // Rutas para mostrar detalles de un usuario específico (show), editar un usuario (edit) y actualizar un usuario (update)
    Route::get('admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');

    // Ruta para eliminar un usuario (destroy)
    Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

});