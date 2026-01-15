<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\OrganizationController as AdminOrg;
use App\Http\Controllers\User\OrganizationController as UserOrg;

use App\Http\Controllers\Admin\TeacherController as AdminTeacher;
use App\Http\Controllers\User\TeacherController as UserTeacher;

use App\Http\Controllers\Admin\CategoryController as AdminCategory;
use App\Http\Controllers\User\CategoryController as UserCategory;

use App\Http\Controllers\Admin\CourseController as AdminCourse;
use App\Http\Controllers\User\CourseController as UserCourse;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'permission:dashboard'])
    ->name('dashboard');


/* =========================
   ADMIN ROUTES
========================= */
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

        //Admin Organization Routes
        Route::prefix('organizations')->name('organizations.')->group(function () {

            Route::get('/', [AdminOrg::class, 'index'])->middleware('permission:organization.view')->name('index');
            Route::get('/create', [AdminOrg::class, 'create'])->middleware('permission:organization.create')->name('create');
            Route::post('/', [AdminOrg::class, 'store'])->middleware('permission:organization.create')->name('store');
            Route::get('/{organization}/edit', [AdminOrg::class, 'edit'])->middleware('permission:organization.edit')->name('edit');
            Route::put('/{organization}', [AdminOrg::class, 'update'])->middleware('permission:organization.edit')->name('update');
            Route::delete('/{organization}', [AdminOrg::class, 'destroy'])->middleware('permission:organization.delete')->name('destroy');

        });

        //Admin Teachers Routes
        Route::prefix('teachers')->name('teachers.')->group(function () {

            Route::get('/', [AdminTeacher::class, 'index'])->middleware('permission:teacher.view')->name('index');
            Route::get('/create', [AdminTeacher::class, 'create'])->middleware('permission:teacher.create')->name('create');
            Route::post('/', [AdminTeacher::class, 'store'])->middleware('permission:teacher.create')->name('store');
            Route::get('/{teacher}/edit', [AdminTeacher::class, 'edit'])->middleware('permission:teacher.edit')->name('edit');
            Route::put('/{teacher}', [AdminTeacher::class, 'update'])->middleware('permission:teacher.edit')->name('update');
            Route::delete('/{teacher}', [AdminTeacher::class, 'destroy'])->middleware('permission:teacher.delete')->name('destroy');

        });

        //Admin Category Routes
        Route::prefix('categories')->name('categories.')->group(function () {

            Route::get('/', [AdminCategory::class, 'index'])->middleware('permission:category.view')->name('index');
            Route::get('/create', [AdminCategory::class, 'create'])->middleware('permission:category.create')->name('create');
            Route::post('/', [AdminCategory::class, 'store'])->middleware('permission:category.create')->name('store');
            Route::get('/{category}/edit', [AdminCategory::class, 'edit'])->middleware('permission:category.edit')->name('edit');
            Route::put('/{category}', [AdminCategory::class, 'update'])->middleware('permission:category.edit')->name('update');
            Route::delete('/{category}', [AdminCategory::class, 'destroy'])->middleware('permission:category.delete')->name('destroy');

        });

        //Admin Courses Routes
        Route::prefix('courses')->name('courses.')->group(function () {

            Route::get('/', [AdminCourse::class, 'index'])->middleware('permission:course.view')->name('index');
            Route::get('/create', [AdminCourse::class, 'create'])->middleware('permission:course.create')->name('create');
            Route::post('/', [AdminCourse::class, 'store'])->middleware('permission:course.create')->name('store');
            Route::get('/{course}/edit', [AdminCourse::class, 'edit'])->middleware('permission:course.edit')->name('edit');
            Route::put('/{course}', [AdminCourse::class, 'update'])->middleware('permission:course.edit')->name('update');
            Route::delete('/{course}', [AdminCourse::class, 'destroy'])->middleware('permission:course.delete')->name('destroy');

        });


});
/* =========================
   USER ROUTES
========================= */
Route::prefix('user')->name('user.')->group(function () {

    //User Organization Routes
    Route::prefix('organizations')->name('organizations.')->group(function () {

        Route::get('/', [UserOrg::class, 'index'])->name('index');
        Route::get('/{organization}', [UserOrg::class, 'show'])->name('show');

    });

    //User Teacher Routes
    Route::prefix('teachers')->name('teachers.')->group(function () {

        Route::get('/', [UserTeacher::class, 'index'])->name('index');
        Route::get('/{teacher}', [UserTeacher::class, 'show'])->name('show');

    });

    //User Category Routes
    Route::prefix('categories')->name('categories.')->group(function () {

        Route::get('/', [UserCategory::class, 'index'])->name('index');
        Route::get('/{category}', [UserCategory::class, 'show'])->name('show');

    });

    //User Course Routes
    Route::prefix('courses')->name('courses.')->group(function () {

        Route::get('/', [UserCourse::class, 'index'])->name('index');
        Route::get('/{course}', [UserCourse::class, 'show'])->name('show');

    });

});

