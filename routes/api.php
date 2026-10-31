<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;

Route::apiResource('genres', GenreController::class);
Route::apiResource('authors', AuthorController::class);