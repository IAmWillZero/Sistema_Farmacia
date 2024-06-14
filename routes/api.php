<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/estudiante', function () {
    return "Listar estudiantes";
});

Route::get('/estudiante/{id}', function () {
    return "Listar estudiantes";
});

Route::post('/estudiante', function () {
    return "Creadno estudiante";
});

Route::put('/estudiante', function () {
    return "actualizando estudiante";
});

Route::patch('/estudiante', function () {
    return "Actualizando varios estudiantes";
});

Route::delete('/estudiante', function () {
    return "Eliminar estudiantes";
});