<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditPdfExportController;
use App\Http\Controllers\AuditExcelExportController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/audit/export/excel', [AuditExcelExportController::class, '__invoke'])->name('audit.export.excel');
Route::get('/audit/export/pdf', [AuditPdfExportController::class, '__invoke'])->name('audit.export.pdf');

