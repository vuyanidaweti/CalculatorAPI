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

Route::controller(\App\Http\Controllers\IncomeTypesController::class)->group(function()
{
    Route::get('/incometypes','index');
    Route::post('/incometypes','store');
    Route::get('incometypes/{id}','getById');
    Route::patch('/incometypes/{id}','update');
    Route::delete('/incometypes/{id}','destroy');
});

//TODO : Create Expense Routes
