<?php
use Illuminate\Support\Facades\Route;
use Ian\UrlShortener\Http\Controllers\UrlShortenerController;

Route::post('/shorten', [UrlShortenerController::class, 'shorten']);
Route::get('/s/{code}', [UrlShortenerController::class, 'redirect']);
