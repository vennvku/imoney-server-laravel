<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;



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

Route::group(['prefix' => 'users'], function () {
    Route::post('/signin', [AuthController::class, 'signin']);
    Route::post('/signup', [AuthController::class, 'signup']);
    
});

Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::group(['prefix' => 'users'], function () {
        Route::post('/signout', [AuthController::class, 'signout']);
        Route::get('/{id}', [AuthController::class, 'user']);
    });

    Route::group(['prefix' => 'categorys'], function () {
        Route::get('/', [CategoryController::class, 'index']);
    }); 

    Route::group(['prefix' => 'transactions'], function () {
        Route::post('/create', [TransactionController::class, 'create']);
        Route::get('/', [TransactionController::class, 'index']);
    }); 

});


Route::group([
    'prefix' => 'tasks'
], function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::post('/create', [TaskController::class, 'create'])->name('create');
    Route::put('/update/{id}', [TaskController::class, 'update'])->name('update');
    Route::delete('/{id}', [TaskController::class, 'destroy'])->name('destroy');
});


