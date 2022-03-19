<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DisplayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('companies/{company}/displays', [CompanyController::class, 'displays']);
Route::apiResource('companies', CompanyController::class);

Route::apiResource('displays', DisplayController::class);
