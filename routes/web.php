<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\HorarioMedicoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PacienteController;

Route::resource('medicos', MedicoController::class);
Route::resource('especialidades', EspecialidadeController::class);
Route::resource('horarios', HorarioMedicoController::class);
Route::resource('consultas', ConsultaController::class);
Route::resource('pacientes', PacienteController::class);

Route::get('/', function () {
    return view('welcome');
});
