<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Api\CertificationController;
use App\Http\Controllers\Api\EducationController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\LanguageController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ResumeGenerationController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::middleware('auth:sanctum')->group(function (): void {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);
    Route::get('/me', [AuthenticatedSessionController::class, 'me']);

    Route::apiResource('resumes', ResumeController::class);

    Route::post('resumes/{resume}/generate', ResumeGenerationController::class);

    Route::prefix('resumes/{resume}')->group(function (): void {
        Route::get('experiences', [ExperienceController::class, 'index']);
        Route::post('experiences', [ExperienceController::class, 'store']);
        Route::patch('experiences/{experience}', [ExperienceController::class, 'update']);
        Route::put('experiences/{experience}', [ExperienceController::class, 'update']);
        Route::delete('experiences/{experience}', [ExperienceController::class, 'destroy']);

        Route::get('educations', [EducationController::class, 'index']);
        Route::post('educations', [EducationController::class, 'store']);
        Route::patch('educations/{education}', [EducationController::class, 'update']);
        Route::put('educations/{education}', [EducationController::class, 'update']);
        Route::delete('educations/{education}', [EducationController::class, 'destroy']);

        Route::get('skills', [SkillController::class, 'index']);
        Route::post('skills', [SkillController::class, 'store']);
        Route::patch('skills/{skill}', [SkillController::class, 'update']);
        Route::put('skills/{skill}', [SkillController::class, 'update']);
        Route::delete('skills/{skill}', [SkillController::class, 'destroy']);

        Route::get('languages', [LanguageController::class, 'index']);
        Route::post('languages', [LanguageController::class, 'store']);
        Route::patch('languages/{language}', [LanguageController::class, 'update']);
        Route::put('languages/{language}', [LanguageController::class, 'update']);
        Route::delete('languages/{language}', [LanguageController::class, 'destroy']);

        Route::get('projects', [ProjectController::class, 'index']);
        Route::post('projects', [ProjectController::class, 'store']);
        Route::patch('projects/{project}', [ProjectController::class, 'update']);
        Route::put('projects/{project}', [ProjectController::class, 'update']);
        Route::delete('projects/{project}', [ProjectController::class, 'destroy']);

        Route::get('certifications', [CertificationController::class, 'index']);
        Route::post('certifications', [CertificationController::class, 'store']);
        Route::patch('certifications/{certification}', [CertificationController::class, 'update']);
        Route::put('certifications/{certification}', [CertificationController::class, 'update']);
        Route::delete('certifications/{certification}', [CertificationController::class, 'destroy']);
    });
});