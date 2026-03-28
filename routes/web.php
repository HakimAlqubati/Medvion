<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $slides = [
        [
            'image'    => '/images/hero-slide-1.png',
            'badge'    => __('land.hero_badge'),
            'title_1'  => __('land.slide1_title1'),
            'title_2'  => __('land.slide1_title2'),
            'subtitle' => __('land.slide1_subtitle'),
        ],
        [
            'image'    => '/images/hero-slide-2.png',
            'badge'    => __('land.hero_badge'),
            'title_1'  => __('land.slide2_title1'),
            'title_2'  => __('land.slide2_title2'),
            'subtitle' => __('land.slide2_subtitle'),
        ],
        [
            'image'    => '/images/hero-slide-3.png',
            'badge'    => __('land.hero_badge'),
            'title_1'  => __('land.slide3_title1'),
            'title_2'  => __('land.slide3_title2'),
            'subtitle' => __('land.slide3_subtitle'),
        ],
    ];
    return view('welcome', compact('slides'));
})->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::view('/privacy-policy', 'privacy')->name('privacy');
Route::view('/terms-conditions', 'terms')->name('terms');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
