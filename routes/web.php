<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ExpertPersonController;
use App\Http\Controllers\SpotifyChartController;
use App\Http\Controllers\MovieController;


Route::resource('community', CommunityController::class);
Route::resource('galleries', GalleryController::class);
Route::resource('staff', StaffController::class);
Route::resource('experts', ExpertPersonController::class);
Route::resource('movies', MovieController::class);
Route::resource('tag', TagController::class);
Route::get('/spotify-chart', [SpotifyChartController::class, 'index']);