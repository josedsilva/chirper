<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

Route::get('/', [ChirpController::class, 'index']);
Route::resource('chirps', ChirpController::class)->except(['index', 'create', 'show']);
