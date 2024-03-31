<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NoteController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', [DashboardController::class, 'index'])->name('admin');


    Route::prefix('notes')->group(function () {

        Route::get('/', [NoteController::class, 'index'])->name('note.index');
        Route::get('/create', [NoteController::class, 'create'])->name('note.create');
        Route::post('/store', [NoteController::class, 'store'])->name('note.store');
        Route::get('/edit/{id}', [NoteController::class, 'edit'])->name('note.edit');
        Route::post('/update/{id}', [NoteController::class, 'update'])->name('note.update');
        Route::delete('/destroy/{id}', [NoteController::class, 'destroy'])->name('note.destroy');

    });
});
