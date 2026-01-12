<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\OrganizationController as AdminOrg;
use App\Http\Controllers\User\OrganizationController as UserOrg;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* =========================
   ADMIN ROUTES
========================= */
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth'])
    ->group(function () {

        Route::prefix('organizations')
            ->name('organizations.')
            ->group(function () {

                Route::get('/', [AdminOrg::class, 'index'])
                    ->middleware('permission:organization.view')
                    ->name('index');

                Route::get('/create', [AdminOrg::class, 'create'])
                    ->middleware('permission:organization.create')
                    ->name('create');

                Route::post('/', [AdminOrg::class, 'store'])
                    ->middleware('permission:organization.create')
                    ->name('store');

                Route::get('/{organization}/edit', [AdminOrg::class, 'edit'])
                    ->middleware('permission:organization.edit')
                    ->name('edit');

                Route::put('/{organization}', [AdminOrg::class, 'update'])
                    ->middleware('permission:organization.edit')
                    ->name('update');

                Route::delete('/{organization}', [AdminOrg::class, 'destroy'])
                    ->middleware('permission:organization.delete')
                    ->name('destroy');
            });
    });



/* =========================
   USER ROUTES
========================= */

Route::prefix('user')
    ->name('user.')
    ->group(function () {

        Route::prefix('organizations')
            ->name('organizations.')
            ->group(function () {

                Route::get('/', [UserOrg::class, 'index'])
                    ->name('index');

                Route::get('/{organization}', [UserOrg::class, 'show'])
                    ->name('show');
            });
    });

