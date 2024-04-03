<?php

use App\Http\Controllers\AcidAlcoholsController;
use App\Http\Controllers\CarboysController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\EthylAcetatesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ZincSulfatesController;
use App\Models\AcidAlcohol;
use App\Models\Carboy;
use App\Models\Equipment;
use App\Models\EthylAcetate;
use App\Models\ZincSulfate;

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

Route::controller(PagesController::class)->group(function () {
    Route::get('/gen-pdf', 'generatePdf');
    Route::get('/', 'index');
});

Route::controller(AcidAlcoholsController::class)->group(function () {
    Route::get('/acid-alcohols', 'index');
});

Route::controller(CarboysController::class)->group(function () {
    Route::get('/carboys', 'index');
});

Route::controller(EquipmentController::class)->group(function () {
    Route::get('/equipment', 'index');
});

Route::controller(EthylAcetatesController::class)->group(function () {
    Route::get('/ethyl-acetates', 'index')
        ->name('ethylAcetates.index');
    Route::get('/get-ethyl-acetates', 'getEthylAcetates');
    Route::post('/ethyl-acetates', 'store')
        ->name('ethylAcetates.create');
});

Route::controller(ZincSulfatesController::class)->group(function () {
    Route::get('/zinc-sulfates', 'index');
});
