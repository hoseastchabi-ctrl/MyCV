<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\Api\ExperienceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EducationController;

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::middleware('auth:sanctum')->group(function (): void {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    Route::get('/me', [AuthenticatedSessionController::class, 'me']);

    Route::apiResource('resumes', ResumeController::class);

    Route::apiResource('resumes.experiences', ExperienceController::class)
        ->scoped()
        ->except('show');
    Route::apiResource('resumes.educations', EducationController::class)
    ->scoped(['education' => 'educations'])
    ->except('show');

    Route::apiResource('resumes.educations', EducationController::class)
    ->scoped()
    ->except('show');
});