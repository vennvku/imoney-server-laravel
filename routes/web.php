<?php

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

// Route::get('/', function () {
//     dd(app()); // Dòng code để kiểm chứng việc đã bind thành công 
// });

// Route::get('/', function () {
//     dd([
//         app()->make('MyUser'),
//         app()->make('MyUser')
//     ]);
// });

// Route::get('/', function() {
//     app()->make('App\Models\User');
// });