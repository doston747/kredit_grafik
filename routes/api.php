<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreditController;
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

Route::post('credit_product',[CreditController::class,'credit_product']);
Route::get('credit_product',[CreditController::class,'get_credit_product']);
Route::post('client',[CreditController::class,'client']);
Route::get('client',[CreditController::class,'getclient']);
Route::post('claim_client',[CreditController::class,'claim_client']);
Route::get('claim_client',[CreditController::class,'get_claim_client']);
Route::post('graph_client',[CreditController::class,'graph_client']);
Route::post('paid',[CreditController::class,'paid']);
Route::post('type',[CreditController::class,'type']);
Route::post('report',[CreditController::class,'report']);
