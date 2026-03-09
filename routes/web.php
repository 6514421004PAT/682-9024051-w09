<?php

use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ExpertPersonController;
use App\Http\Controllers\SpotifyChartController;

Route::resource('communities', CommunityController::class);
Route::resource('galleries', GalleryController::class);
Route::resource('tag', TagController::class);
Route::resource('staff', StaffController::class);
Route::resource('staff', StaffController::class);
Route::resource('expert', ExpertPersonController::class);
Route::resource('experts', ExpertPersonController::class);
Route::get('/spotify-chart', [SpotifyChartController::class, 'index']);