<?php

use App\Http\Controllers\PlayerController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/players');
Route::resource('players', PlayerController::class)->except(['show']);
