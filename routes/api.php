<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TreatmentController;

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
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('verify-code', [AuthController::class, 'codeVerification']);
Route::post('resend-code', [AuthController::class, 'resendCode']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('questions', [TreatmentController::class, 'getQuestions']);
Route::get('levels', [TreatmentController::class, 'getLevels']);
Route::post('leave-message', [TreatmentController::class, 'LeaveMessage']);
Route::post('account-recovery-email', [TreatmentController::class, 'recoverEmail']);
Route::post('confirm-password-recovery-code', [TreatmentController::class, 'passwordCodeConfirmation']);