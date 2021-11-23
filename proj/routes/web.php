<?php

use App\Http\Controllers\AdmController;
use App\Http\Controllers\CommoditieController;
use App\Http\Controllers\menuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ menuController::class,'show']);

Route::get('/Adm',[AdmController::class,'index']);

Route::get('menus', [ menuController::class,'index']);
Route::get('menus/create', [ menuController::class,'create']);
Route::post('menus', [ menuController::class,'store']);
Route::get('menus/{menu}', [ menuController::class,'show']);
Route::get('menus/{menu}/edit', [ menuController::class,'edit']);
Route::patch('menus/{menu}', [ menuController::class,'update']);
Route::delete('menus/{menu}', [ menuController::class,'destroy']);

Route::get('commodities', [ CommoditieController::class,'index']);
Route::get('commodities/create', [ CommoditieController::class,'create']);
Route::post('commodities', [ CommoditieController::class,'store']);
Route::get('commodities/{commoditie}', [ CommoditieController::class,'show']);
Route::get('commodities/{commoditie}/edit', [ CommoditieController::class,'edit']);
Route::patch('commodities/{commoditie}', [ CommoditieController::class,'update']);
Route::delete('commodities/{commoditie}', [ CommoditieController::class,'destroy']);



