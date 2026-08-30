<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\JoinController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CourseController::class, 'today'])->name('today');

Route::get('/modules', [CourseController::class, 'modules'])->name('modules.index');

Route::get('/modules/{module}', [CourseController::class, 'module'])
    ->whereNumber('module')
    ->name('modules.show');

Route::get('/modules/{module}/session-{session}', [CourseController::class, 'session'])
    ->whereNumber(['module', 'session'])
    ->name('modules.session');

Route::get('/modules/{module}/challenge', [CourseController::class, 'challenge'])
    ->whereNumber('module')
    ->name('modules.challenge');

Route::get('/field-guide', [CourseController::class, 'fieldGuide'])->name('field-guide');

Route::get('/syllabus', [CourseController::class, 'syllabus'])->name('syllabus');

Route::get('/join', [JoinController::class, 'qr'])->name('join.qr');
Route::get('/join/{code}', [JoinController::class, 'show'])->name('join.show');

Route::get('/experiences/campus-event-registration', [ExperienceController::class, 'campusEventRegistration'])
    ->name('experiences.campus-event-registration');
