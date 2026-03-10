<?php

use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ExpertPersonController;
use App\Http\Controllers\SpotifyChartController;
use App\Http\Controllers\MovieController;

Route::resource('communities', CommunityController::class);
Route::resource('galleries', GalleryController::class);
Route::resource('tag', TagController::class);
Route::resource('staff', StaffController::class);
Route::resource('staff', StaffController::class);
Route::resource('expert', ExpertPersonController::class);
Route::resource('experts', ExpertPersonController::class);
Route::get('/spotify-chart', [SpotifyChartController::class, 'index']);
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');
Route::resource('movies', MovieController::class);