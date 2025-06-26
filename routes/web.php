<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;



// rutas de post
Route::resource('/posts', PostController::class);
