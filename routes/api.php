 <?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\MeasurementController;

/*
|-------------------------
| Public Routes
|-------------------------
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

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