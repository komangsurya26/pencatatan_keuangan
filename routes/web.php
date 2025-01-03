<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::name('api')->prefix('api')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('.login');
    Route::post('register', [AuthController::class, 'register'])->name('.register');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('.logout');

        Route::name('.expense.')->prefix('/expense')->group(function () {
            Route::get('', [ExpenseController::class, 'fetch'])->name('fetch');
            Route::post('/store', [ExpenseController::class, 'store'])->name('store');
            Route::post('/update/{id}', [ExpenseController::class, 'update'])->name('update');
        });

        Route::name('.income.')->prefix('/income')->group(function () {
            Route::get('', [IncomeController::class, 'fetch'])->name('fetch');
            Route::post('/store', [IncomeController::class, 'store'])->name('store');
            Route::post('/update/{id}', [IncomeController::class, 'update'])->name('update');
        });

        Route::name('.category.')->prefix('/category')->group(function () {
            Route::get('', [CategoryController::class, 'fetch'])->name('fetch');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
        });
    });
});

// view login
Route::get('login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');


// view dashboard
Route::prefix('dashboard')->name('dashboard')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/income', [IncomeController::class, 'index'])->name('.income');
    Route::get('/expense', [ExpenseController::class, 'index'])->name('.expense');
});
