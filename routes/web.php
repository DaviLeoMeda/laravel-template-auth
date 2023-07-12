<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// il gruppo di rotte gestite dal middleware devono iniziare tuttle con admin/..
// Per questo aggiungo il prefix
// Va poi modificato il path delle rotte interne al gruppo se necessario
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    //tutte le localhost:8000/admin/....
    
    // Ho spostato la rotta della dashboard all'interno del gruppo gestito dalla middleware creando un controller
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    //rotte per la gestione del profilo
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
