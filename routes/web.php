<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
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
        Route::get('login', [AuthController::class, 'index'])->name('auth.admin.index');
        Route::post('login', [AuthController::class, 'adminLogin'])->name('auth.admin.login');
        Route::post('logout', [AuthController::class, 'adminLogout'])->name('auth.admin.logout');
    });

    Route::prefix('stakeholder')->group(function(){
        Route::get('login', [AuthController::class, 'index'])->name('auth.stake.index');
        Route::post('login', [AuthController::class, 'stakeLogin'])->name('auth.stake.login');
        Route::post('logout', [AuthController::class, 'stakeLogout'])->name('auth.stake.logout');
    });

    Route::prefix('super4dmin')->group(function(){
        Route::get('login', [AuthController::class, 'index'])->name('auth.super.index');
        Route::post('login', [AuthController::class, 'superLogin'])->name('auth.super.login');
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
Route::prefix('super')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'super'])->name('super.dashboard.index');
    Route::resource('users', UserController::class, [
        'as' => 'super'
    ]);
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
Route::prefix('super')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'super'])->name('super.dashboard.index');
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
Route::prefix('super')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'super'])->name('super.dashboard.index');
});
/*
|++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
| STAKEHOLDER END
|++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
*/