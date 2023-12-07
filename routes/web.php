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
    $lastfm = new \App\Services\Lastfm\LastfmService();

    dd($lastfm->track()->getSimilar(mbid: '37d516ab-d61f-4bcb-9316-7a0b3eb845a8'));
    dd($lastfm->geo()->getTopTracks('Brazil'));
});
