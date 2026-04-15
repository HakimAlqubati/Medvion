<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\CourseRegistrationController;
use App\Http\Controllers\Frontend\SurveyController;
use Illuminate\Support\Facades\Route;

// ─── Public routes ────────────────────────────────────────────────────────────

Route::get('/', function () {
    $slides  = \App\Services\Frontend\HeroSlideService::getSlides();
    $impacts = app(\App\Services\Frontend\AboutService::class)->getImpacts();
    return view('welcome', compact('slides', 'impacts'));
})->name('home');

Route::get('/about',   [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact',[ContactController::class, 'store'])->name('contact.store');

Route::get('/privacy-policy', function () {
    $page = \App\Services\Frontend\PageService::getPage('privacy');
    abort_if(!$page, 404);
    return view('privacy', compact('page'));
})->name('privacy');

Route::get('/terms-conditions', function () {
    $page = \App\Services\Frontend\PageService::getPage('terms');
    abort_if(!$page, 404);
    return view('terms', compact('page'));
})->name('terms');

Route::get('/expert-board', [SurveyController::class, 'show'])->name('expert-board');
Route::post('/expert-board',[SurveyController::class, 'store'])->name('expert-board.store');

// ─── Courses — Authentication required ────────────────────────────────────────

Route::middleware(['auth'])->group(function () {
    Route::get('/courses',         [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{slug}',  [CourseController::class, 'show'])->name('courses.show');
    Route::post('/courses/register',[CourseRegistrationController::class, 'store'])->name('courses.register');
});

// ─── Dashboard & Profile ─────────────────────────────────────────────────────

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
