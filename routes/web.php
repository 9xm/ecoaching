<?php

use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\BatchController;

use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Student\StudentCourseController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/courses', [SiteController::class, 'courses'])->name('courses');



Route::group([ 'middleware'=> ['auth', 'verified']],function () {
    Route::get('/courses/{id}', [SiteController::class, 'course'])->name('course');
    Route::post('/join/course', [SiteController::class, 'join'])->name('join.course.store');
});


Route::group(['prefix'=> 'admin', 'as'=> 'admin.', 'middleware'=> ['auth', 'verified']],function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::resources([
        'users'=> UserController::class,
        'courses'=> CourseController::class,
        'batches'=> BatchController::class,
    ]);

    Route::get('join/courses', [CourseController::class, 'joinCourses'])->name('join.courses');
    Route::get('join/course/{id}/edit', [CourseController::class, 'joinCourseEdit'])->name('join.course.edit');
    Route::put('join/course/{id}/edit', [CourseController::class, 'joinCourseUpdate'])->name('join.course.update');

});

Route::group(['prefix'=> 'student', 'as'=> 'student.', 'middleware'=> ['auth', 'verified']],function () {
    Route::get('dashboard', [StudentDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('join/courses', [StudentCourseController::class, 'joinCourses'])->name('join.courses');
    Route::get('/certificate/{id}', [StudentCourseController::class, 'certificate'])->name('certificate');

});

/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

require __DIR__.'/auth.php';
