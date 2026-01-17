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

use App\Http\Controllers\Admin\LessonController  as AdminLesson;
use App\Http\Controllers\User\LessonController  as UserLesson;

use App\Http\Controllers\Admin\EnrollmentController  as AdminEnroll;
use App\Http\Controllers\User\EnrollmentController  as UserEnroll;

use App\Http\Controllers\Admin\PaymentController as AdminPayment;
use App\Http\Controllers\User\PaymentController as UserPayment;

use App\Http\Controllers\Admin\PaymentMethodController;

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

        //Admin Lessons Routes
         Route::prefix('lessons')->name('lessons.')->group(function () {

            Route::get('/', [AdminLesson::class, 'index'])->middleware('permission:lesson.view')->name('index');
            Route::get('/create', [AdminLesson::class, 'create'])->middleware('permission:lesson.create')->name('create');
            Route::post('/', [AdminLesson::class, 'store'])->middleware('permission:lesson.create')->name('store');
            Route::get('/{lesson}/edit', [AdminLesson::class, 'edit'])->middleware('permission:lesson.edit')->name('edit');
            Route::put('/{lesson}', [AdminLesson::class, 'update'])->middleware('permission:lesson.edit')->name('update');
            Route::delete('/{lesson}', [AdminLesson::class, 'destroy'])->middleware('permission:lesson.delete')->name('destroy');

        });


        //Admin Enrollment Routes
        Route::prefix('enrollments')->name('enrollments.')->group(function () {

            Route::get('/', [AdminEnroll::class, 'index'])->middleware('permission:enrollment.view')->name('index');
            Route::get('/{enrollment}', [AdminEnroll::class, 'show'])->middleware('permission:enrollment.view')->name('show');
            Route::put('/{enrollment}', [AdminEnroll::class, 'update'])->middleware('permission:enrollment.edit')->name('update');
            Route::delete('/{enrollment}', [AdminEnroll::class, 'destroy'])->middleware('permission:enrollment.delete')->name('destroy');

        });

        //Admin Payment Routes
        Route::prefix('payments')->name('payments.')->group(function () {

            Route::get('/', [AdminPayment::class, 'index'])->middleware('permission:payment.view')->name('index');
            Route::get('/{payment}', [AdminPayment::class, 'show'])->middleware('permission:payment.view')->name('show');
            Route::put('/{payment}', [AdminPayment::class, 'update'])->middleware('permission:payment.edit')->name('update');
            Route::delete('/{payment}', [AdminPayment::class, 'destroy'])->middleware('permission:payment.delete')->name('destroy');

        });

        //Admin Payment Methods Routes
        Route::prefix('payment-methods')->name('payment-methods.')->group(function () {

            Route::get('/', [PaymentMethodController::class, 'index'])->middleware('permission:payment_method.view')->name('index');
            Route::get('/create', [PaymentMethodController::class, 'create'])->middleware('permission:payment_method.create')->name('create');
            Route::post('/', [PaymentMethodController::class, 'store'])->middleware('permission:payment_method.create')->name('store');
            Route::get('/{paymentMethod}/edit', [PaymentMethodController::class, 'edit'])->middleware('permission:payment_method.edit')->name('edit');
            Route::put('/{paymentMethod}', [PaymentMethodController::class, 'update'])->middleware('permission:payment_method.edit')->name('update');
            Route::delete('/{paymentMethod}', [PaymentMethodController::class, 'destroy'])->middleware('permission:payment_method.delete')->name('destroy');

            Route::patch('/{paymentMethod}/toggle',[PaymentMethodController::class, 'toggle'])->middleware('permission:payment_method.edit')->name('toggle');

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

    // User Lesson Routes
    Route::prefix('courses/{course}')->group(function () {

        Route::prefix('lessons')->name('lessons.')->group(function () {
            Route::get('/', [UserLesson::class, 'index'])->name('index');
            Route::get('/{lesson}', [UserLesson::class, 'show'])->name('show');

            });

    });


    //User Enrollment Routes
    Route::prefix('courses/{course}')->group(function () {

        Route::post('/enroll', [UserEnroll::class, 'store'])->name('enrollments.store');
        Route::get('/enrollment', [UserEnroll::class, 'show'])->name('enrollments.show');
        Route::delete('/unenroll', [UserEnroll::class, 'destroy'])->name('enrollments.destroy');

    });


});


//User Payment Routes
Route::prefix('user')->name('user.')->middleware('auth')->group(function () {

    Route::prefix('courses/{course}')->group(function () {

        Route::get('/payment', [UserPayment::class, 'create'])->name('payments.create');
        Route::post('/payment', [UserPayment::class, 'store'])->name('payments.store');

    });

});

