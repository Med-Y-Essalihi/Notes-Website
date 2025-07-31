<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('items.index');
    })->name('dashboard');

    Route::resource('items', ItemController::class);
});

// Include auth routes
require __DIR__.'/auth.php';

