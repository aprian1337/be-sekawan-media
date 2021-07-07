<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Super\CredentialsController;
use App\Http\Controllers\Super\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| AUTH START
|--------------------------------------------------------------------------
*/
Route::prefix('auth')->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('login', [AuthController::class, 'index'])->middleware('guest')->name('auth.admin.index');
        Route::post('login', [AuthController::class, 'adminLogin'])->middleware('guest')->name('auth.admin.login');
        Route::post('logout', [AuthController::class, 'adminLogout'])->name('auth.admin.logout');
    });

    Route::prefix('stakeholder')->group(function(){
        Route::get('login', [AuthController::class, 'index'])->middleware('guest')->name('auth.stake.index');
        Route::post('login', [AuthController::class, 'stakeLogin'])->middleware('guest')->name('auth.stake.login');
        Route::post('logout', [AuthController::class, 'stakeLogout'])->name('auth.stake.logout');
    });

    Route::prefix('super4dmin')->group(function(){
        Route::get('login', [AuthController::class, 'index'])->middleware('guest')->name('auth.super.index');
        Route::post('login', [AuthController::class, 'superLogin'])->middleware('guest')->name('auth.super.login');
        Route::post('logout', [AuthController::class, 'superLogout'])->name('auth.super.logout');
    });
});
/*
|++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
| AUTH END
|++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/







/*
|--------------------------------------------------------------------------
| SUPER ADMIN START
|--------------------------------------------------------------------------
*/
Route::prefix('super')->middleware('auth.super')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'super'])->name('super.dashboard.index');
    Route::resource('users', UserController::class, [
        'as' => 'super'
    ]);
    Route::prefix('credentials')->group(function(){
        Route::prefix('admin')->group(function(){
            Route::get('', [CredentialsController::class, 'index'])->name('super.credentials.admin.index');
            Route::post('', [CredentialsController::class, 'adminStore'])->name('super.credentials.admin.store');
            Route::post('{id}/forget', [CredentialsController::class, 'adminForget'])->name('super.credentials.admin.forget');
            Route::delete('{id}', [CredentialsController::class, 'adminDestroy'])->name('super.credentials.admin.destroy');
        });

        Route::prefix('stakeholder')->group(function(){
            Route::get('', [CredentialsController::class, 'index'])->name('super.credentials.stakeholder.index');
            Route::post('', [CredentialsController::class, 'stakeholderStore'])->name('super.credentials.stakeholder.store');
            Route::post('{id}/forget', [CredentialsController::class, 'stakeholderForget'])->name('super.credentials.stakeholder.forget');
            Route::delete('{id}', [CredentialsController::class, 'stakeholderDestroy'])->name('super.credentials.stakeholder.destroy');
        });

    });
});
/*
|++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
| SUPER ADMIN END
|++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/








/*
|--------------------------------------------------------------------------
| ADMIN START
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard.index');
});
/*
|++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
| ADMIN END
|++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/










/*
|--------------------------------------------------------------------------
| STAKEHOLDER START
|--------------------------------------------------------------------------
*/
Route::prefix('stakeholder')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'stakeholder'])->name('stakeholder.dashboard.index');
});
/*
|++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
| STAKEHOLDER END
|++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/