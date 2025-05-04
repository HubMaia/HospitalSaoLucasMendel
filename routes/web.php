<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\EspecialidadeController;

Route::resource('medicos', MedicoController::class);
Route::resource('especialidades', EspecialidadeController::class);

Route::get('/', function () {
    return view('welcome');
});
