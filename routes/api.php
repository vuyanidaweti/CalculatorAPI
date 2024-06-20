<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(\App\Http\Controllers\IncomeController::class)->group(function()
{
    Route::get('/incomes','index');
    Route::post('/incomes','store');
    Route::get('/incomes/{id}','getById');
    Route::patch('/incomes/{id}','update');
    Route::delete('/incomes/{id}','destroy');
});

Route::controller(\App\Http\Controllers\IncomeTypesController::class)->group(function () {
    Route::get('/incometypes', 'index');
    Route::post('/incometypes', 'store');
    Route::get('incometypes/{id}', 'getById');
    Route::patch('/incometypes/{id}', 'update');
    Route::delete('/incometypes/{id}', 'destroy');
});

Route::controller(\App\Http\Controllers\ExpenseTypeController::class)->group(function () {
    Route::get('/expenseType', 'index');
    Route::post('/expenseType', 'store');
    Route::get('/expenseType/{id}', 'show');
    Route::patch('/expenseType/{id}', 'update');
    Route::delete('/expenseType/{id}', 'destroy');

});
Route::controller(\App\Http\Controllers\ExpenseController::class)->group(function () {
    Route::get('/expense', 'index');
    Route::post('/expense', 'store');
    Route::get('/expense/{id}', 'show');
    Route::patch('/expense/{id}', 'update');
    Route::delete('/expense/{id}', 'destroy');

});

Route::controller(\App\Http\Controllers\SavingsController::class)->group(function () {
    Route::get('/savings', 'index');
    Route::post('/savings', 'store');
    Route::get('/savings/{id}', 'show');
    Route::patch('/savings/{id}', 'update');
    Route::delete('/savings/{id}', 'destroy');

});
Route::controller(\App\Http\Controllers\SavingsTypeController::class)->group(function () {
    Route::get('/savingsType', 'index');
    Route::post('/savingsType', 'store');
    Route::get('/savingsType/{id}', 'show');
    Route::patch('/savingsType/{id}', 'update');
    Route::delete('/savingsType/{id}', 'destroy');

});
