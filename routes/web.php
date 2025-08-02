<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\History\HistoryController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Preview\PreviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'actionLogin'])->name('action.login');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/generate-report', [HomeController::class, 'generateReport'])->name('generate-report');
Route::post('/generate-report-v2', [HomeController::class, 'generateReportV2'])->name('generate-report-v2');

Route::get('/preview', [PreviewController::class, 'index'])->name('preview');

Route::get('/history', [HistoryController::class, 'index'])->name('history');
Route::post('/history/delete', [HistoryController::class, 'deleteReport'])->name('delete-report');
