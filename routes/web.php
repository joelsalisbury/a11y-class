<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExperienceController;
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

Route::get('/modules/{module}/resources', [CourseController::class, 'resources'])
    ->whereNumber('module')
    ->name('modules.resources');

Route::get('/field-guide', [CourseController::class, 'fieldGuide'])->name('field-guide');

Route::get('/field-guide/{entry}', [CourseController::class, 'fieldGuideEntry'])
    ->where('entry', '[a-z0-9-]+')
    ->name('field-guide.entry');

Route::get('/syllabus', [CourseController::class, 'syllabus'])->name('syllabus');

Route::get('/changelog', [CourseController::class, 'changelog'])->name('changelog');

Route::get('/experiences/campus-event-registration', [ExperienceController::class, 'campusEventRegistration'])
    ->name('experiences.campus-event-registration');
