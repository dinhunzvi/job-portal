<?php

use App\Http\Controllers\Api\CandidateController;
use App\Http\Controllers\Api\CandidateDocumentController;
use App\Http\Controllers\Api\CandidateResumeController;
use App\Http\Controllers\Api\EmploymentRecordController;
use App\Http\Controllers\Api\UserController;
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

Route::get( '/auth/logout/{id}', [ AuthController::class, 'logout' ] );

Route::put( '/auth/change-password/{id}', [ AuthController::class, 'change_password' ] );

Route::apiResource( 'candidates', CandidateController::class );

Route::apiResource( 'candidate-documents', CandidateDocumentController::class );

Route::apiResource( 'candidate-resumes', CandidateResumeController::class );

Route::apiResource( 'employment-records', EmploymentRecordController::class );

Route::apiResource( 'users', UserController::class );

Route::get( 'candidate/employment-records/{id}', [ EmploymentRecordController::class, 'employee_records' ] );

Route::get( 'candidate/documents/{id}', [ CandidateDocumentController::class, 'candidate_documents' ] );

Route::get( 'candidate/resume/{id}', [ CandidateResumeController::class, 'candidate_resume' ] );


