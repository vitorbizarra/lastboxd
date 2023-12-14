<?php

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

Route::name('app.')->middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', \App\Livewire\App\Home::class)->name('dashboard');

    Route::name('results.')->prefix('results')->group(function () {
        Route::get('/{term}', \App\Livewire\App\Search\Items::class)->name('index');
        Route::get('/tracks/{term}', \App\Livewire\App\Search\Tracks::class)->name('tracks');
    });
});
