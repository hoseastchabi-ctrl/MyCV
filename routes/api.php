<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\SkillController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('resumes.skills', SkillController::class)->shallow();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('resumes.educations', EducationController::class)->shallow();
});

Route::middleware('auth:sanctum')->get('/me', function () {
    return auth()->user();
});

Route::get('/test', function () {
    return response()->json(['ok' => true]);
});
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('resumes.experiences', ExperienceController::class)->shallow();
});

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    Route::get('/me', [AuthenticatedSessionController::class, 'me']);

    Route::middleware('auth:sanctum')->group(function () {

    Route::get('/resumes', [ResumeController::class, 'index']);
    Route::post('/resumes', [ResumeController::class, 'store']);
    Route::get('/resumes/{id}', [ResumeController::class, 'show']);
    Route::delete('/resumes/{id}', [ResumeController::class, 'destroy']);});
});