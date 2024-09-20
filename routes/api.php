<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\KYCController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SliderController;
use App\Http\Controllers\Api\MetalPriceController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/addSelfi_Kyc', [KYCController::class, 'store']);  

Route::post('/update_selfi/{id}', [KYCController::class, 'update_selfi']); 

Route::post('/kyc', [KYCController::class, 'update']); 
Route::get('/kyc/{id}', [KYCController::class, 'show'])->name('kyc.show');

Route::get('/slider', [SliderController::class, 'slider']);

Route::get('latest-prices', [MetalPriceController::class, 'getLatestPrices']);
Route::get('get_metal_Prices', [MetalPriceController::class, 'get_metal_Prices']);

Route::middleware('auth:sanctum')->post('/logout', [ApiAuthController::class, 'logout']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::POST('/profile_update/{id}', [ProfileController::class, 'profile_update']);     
    Route::GET('/profile_list/{id}', [ProfileController::class, 'profile_list']);     
    

});
