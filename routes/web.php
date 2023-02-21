<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chamadoController;

Route::get('/', [chamadoController:: class, 'index']);
Route::get('/chamados/chamados', [chamadoController:: class, 'listChamados']);
Route::get('/chamados/create', [chamadoController:: class, 'create']);
Route::get('/chamados/{id}', [chamadoController:: class, 'show']);
Route::POST('/chamados', [chamadoController:: class, 'store']);

// Route::POST('/chamados', [chamadoController:: class, 'store']);