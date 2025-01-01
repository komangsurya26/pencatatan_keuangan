<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\IncomeController;
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

Route::name('auth.')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

Route::name('api.')->group(function () {
    Route::name('expense.')->prefix('/expense')->middleware('auth:sanctum')->group(function () {
        Route::get('', [ExpenseController::class, 'fetch'])->name('fetch');
        Route::post('/create', [ExpenseController::class, 'create'])->name('create');
        Route::post('/update/{id}', [ExpenseController::class, 'update'])->name('update');
    });
    
    Route::name('income.')->prefix('/income')->middleware('auth:sanctum')->group(function () {
        Route::get('', [IncomeController::class, 'fetch'])->name('fetch');
        Route::post('/create', [IncomeController::class, 'create'])->name('create');
        Route::post('/update/{id}', [IncomeController::class, 'update'])->name('update');
    });
    
    Route::name('category.')->prefix('/category')->middleware('auth:sanctum')->group(function () {
        Route::get('', [CategoryController::class, 'fetch'])->name('fetch');
        Route::post('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
    });
});
