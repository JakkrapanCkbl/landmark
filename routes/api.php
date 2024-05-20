<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiJobController;
use App\Http\Controllers\Api\ApiComputerController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('addjobapi', [ApiJobController::class, 'store']);
Route::get('addjobapi', [ApiJobController::class, 'index']);

// Route::get('/addjobapi', function(){
//     return 'this is api';
// });

//======== for Ms Word Template login ========
Route::post('/computers', [ApiComputerController::class, 'store']);
Route::get('/computers', [ApiComputerController::class, 'index']);
Route::get('/computers/{cpu_id}', [ApiComputerController::class, 'show']);

