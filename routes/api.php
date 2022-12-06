<?php

use App\Http\Controllers\Api\CandidateController;
use App\Http\Controllers\Api\CandidateDocumentController;
use App\Http\Controllers\Api\EmploymentRecordController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post( 'auth/register', [ CandidateController::class, 'store' ] );

Route::post( 'auth/candidate/login', [ AuthController::class, 'login' ] );

Route::apiResource( 'candidate-documents', CandidateDocumentController::class );

Route::apiResource( 'employment-records', EmploymentRecordController::class );

Route::get( 'candidate/employment-records/{id}', [ EmploymentRecordController::class, 'employee_records' ] );

Route::get( 'candidate/documents/{id}', [ CandidateDocumentController::class, 'candidate_documents' ] );


