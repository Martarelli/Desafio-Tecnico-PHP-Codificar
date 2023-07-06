<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrcamentoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [OrcamentoController::class, 'index']);
Route::get('/create', [OrcamentoController::class, 'create']);
Route::post('/create/store', [OrcamentoController::class, 'store']);
