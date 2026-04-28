<?php
<<<<<<< HEAD
use App\Http\Controllers\CustomerController;
 Route::resource('customers', CustomerController::class);
 use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'TEST OK';
=======

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
>>>>>>> 9072694e6322ba767a4cb4105c5523ef083e5c22
});
