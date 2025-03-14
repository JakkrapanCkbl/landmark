<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiJobController;
use App\Http\Controllers\Api\ApiComputerController;
use App\Models\User;
use App\Http\Controllers\UpdateFromVbController;

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


Route::get('login', function(){
    abort(401);
})->name('login');

Route::post('login', function(){
    $credentials = request()->only(['email', 'password']);
    if (!auth()->validate($credentials)) {
        abort(402);
    }else{
        $user = User::where('email', $credentials['email'])->first();
        $user->tokens()->delete();
        $token = $user->createToken('postman',['admin']);
        return response()->json(['token' => $token->plainTextToken],200);
    }
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('addjobapi', [ApiJobController::class, 'store']);
    Route::get('addjobapi', [ApiJobController::class, 'index']);
    Route::put('/editjobapi/{id}', [ApiJobController::class, 'update']);
    Route::put('/update_job_from_report/{fieldValue}', [ApiJobController::class, 'update_job_from_report'])->where('fieldValue', '.*');
});



// Route::get('/addjobapi', function(){
//     return 'this is api';
// });

//======== for Ms Word Template login ========
Route::post('/computers', [ApiComputerController::class, 'store']);
Route::get('/computers', [ApiComputerController::class, 'index']);
Route::get('/computers/{cpu_id}', [ApiComputerController::class, 'show']);

Route::post('myuser', function() {
    return 'POST';
});

// Route::post('login',[ApiJobController::class, 'login']);


