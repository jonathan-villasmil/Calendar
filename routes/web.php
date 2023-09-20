<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventTypeController;
use Dotenv\Store\File\Paths;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    //Route::resource('admin/users', UserController::class);

    //CRUD USERS
    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    
    //CRUD EVENT TYPES
    Route::get('admin/event-types', [EventTypeController::class, 'index'])->name('admin.event-types.index');
    Route::get('admin/event-types/create', [EventTypeController::class, 'create'])->name('admin.event-types.create');
    Route::post('admin/event-types', [EventTypeController::class, 'store'])->name('admin.event-types.store');
    Route::get('admin/event-types/{eventType}', [EventTypeController::class, 'show'])->name('admin.event-types.show');
    Route::get('admin/event-types/{eventType}/edit', [EventTypeController::class, 'edit'])->name('admin.event-types.edit');
    Route::put('admin/event-types/{eventType}', [EventTypeController::class, 'update'])->name('admin.event-types.update');
    Route::delete('admin/event-types/{eventType}', [EventTypeController::class, 'destroy'])->name('admin.event-types.destroy');
});
