<?php
use App\Http\Controllers\CustomerController;
 Route::resource('customers', CustomerController::class);
 use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return 'TEST OK';
});
