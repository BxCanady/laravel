<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

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

// This route will handle the root URL and use the index method of JobController
Route::get('/', [JobController::class, 'index']);

// You can keep the default welcome route if you want, or remove it
// Route::get('/', function () {
//     return view('welcome');
// });

// Add any additional routes for your application below
