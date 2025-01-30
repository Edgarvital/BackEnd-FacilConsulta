<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::get('/cidades/{cidade_id}/medicos', [MedicoController::class, 'indexByCities']);
Route::get('/cidades', [CidadeController::class, 'index']);
Route::get('/medicos', [MedicoController::class, 'index']);


Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/medicos', [MedicoController::class, 'store']);
    Route::post('/medicos/consulta', [MedicoController::class, 'storeConsulta']);
    Route::post('/pacientes/{paciente_id}', [PacienteController::class, 'update']);
    Route::post('/pacientes', [PacienteController::class, 'store']);
    Route::get('/medicos/{id_medico}/pacientes', [PacienteController::class, 'index']);
});
