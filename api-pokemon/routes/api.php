<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

Route::get('/pokemons', [PokemonController::class, 'list']);
Route::get('/pokemon/{name}', [PokemonController::class, 'view']);

