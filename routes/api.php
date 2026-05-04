 <?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\MeasurementController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
/*
|-------------------------
| Public Routes
|-------------------------
*/

Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders', [OrderController::class, 'index']);
Route::get('/orders/{id}', [OrderController::class, 'show']);
Route::put('/orders/{id}', [OrderController::class, 'update']);
Route::delete('/orders/{id}', [OrderController::class, 'destroy']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::post('/payments', [PaymentController::class, 'store']);
Route::get('/payments', [PaymentController::class, 'index']);
Route::get('/payments/order/{id}', [PaymentController::class, 'byOrder']);
Route::get('/payments/balance/{id}', [PaymentController::class, 'balance']);
/*
|-------------------------
| Measurements API
|-------------------------
*/

Route::apiResource('measurements', MeasurementController::class);

/*
|-------------------------
| Clients API (NO AUTH for now)
|-------------------------
*/

Route::post('/clients', [ClientController::class, 'store']);
Route::get('/clients', [ClientController::class, 'index']);

/*
|-------------------------
| Profile (protected - optional)
|-------------------------
*/

Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
    return $request->user();
});