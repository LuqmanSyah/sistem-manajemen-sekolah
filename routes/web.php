<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\ClassController as AdminClassController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;
use App\Http\Controllers\Admin\LessonController as AdminLessonController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PagesController::class, 'home'])->name('home');

Route::get('/berita', [PagesController::class, 'news']);

Route::get('/forum', [PagesController::class, 'forum']);

Route::get('/post/detail', [PostController::class, 'show'])->name('post.show');

Route::get('/lowongan', [PagesController::class, 'vacancy']);

Route::get('/lowongan/detail', [VacancyController::class, 'show']);

Route::get('/login', [AuthController::class, 'login']);

Route::get('/portal-orangtua', function () {
    return view('pages.portalortu');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings');
    Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');

    // Kela
    Route::prefix('class')->name('class.')->group(function () {
        Route::get('/', [AdminClassController::class, 'index'])->name('index');
        Route::get('/create', [AdminClassController::class, 'create'])->name('create');
        Route::post('/create', [AdminClassController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminClassController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [AdminClassController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AdminClassController::class, 'delete'])->name('delete');
    });

    // Siswa
    Route::prefix('student')->name('student.')->group(function () {
        Route::get('/', [AdminStudentController::class, 'index'])->name('index');
    });

    // Guru
    Route::prefix('teacher')->name('teacher.')->group(function () {
        Route::get('/', [AdminTeacherController::class, 'index'])->name('index');
        Route::get('/create', [AdminTeacherController::class, 'create'])->name('create');
        Route::post('/create', [AdminTeacherController::class, 'store'])->name('store');
    });

    // Jurusan
    Route::prefix('department')->name('department.')->group(function () {
        Route::get('/', [AdminDepartmentController::class, 'index'])->name('index');
        Route::get('/create', [AdminDepartmentController::class, 'create'])->name('create');
        Route::post('/create', [AdminDepartmentController::class, 'store'])->name('store');
        Route::post('{id}', [AdminDepartmentController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AdminDepartmentController::class, 'delete'])->name('delete');
        Route::get('/delete-all', [AdminDepartmentController::class, 'deleteAll'])->name('deleteAll');
    });

    // Mata Pelajaran
    Route::prefix('lesson')->name('lesson.')->group(function () {
        Route::get('/', [AdminLessonController::class, 'index'])->name('index');
        Route::post('/', [AdminLessonController::class, 'store'])->name('store');
        Route::put('{id}', [AdminLessonController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [AdminLessonController::class, 'delete'])->name('delete');
    });
});
