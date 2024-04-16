<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\CoinNetworkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::controller(CoinController::class)->group(function () {
    Route::get('/all/coin', 'AllCoin')->name('all.coin');
});

Route::controller(CoinNetworkController::class)->group(function () {
    Route::get('/all/network', 'AllNetwork')->name('all.network');
});
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('/all/user', 'AllUser')->name('all.user');
        Route::get('/create/user', 'create')->name('create.user');
        Route::get('/delete/user/{id}', 'delete')->name('delete.user');
        Route::get('/status/user/{id}', 'status')->name('status.user');
    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'index')->name('admin.index');
        Route::get('/admin/edit/{id}', 'profile')->name('admin.profile');
        Route::post('/admin/update', 'update')->name('admin.update');
        Route::post('/admin/image/update', 'imageUpdate')->name('admin.image.update');
    });
    Route::controller(CoinNetworkController::class)->group(function () {
        Route::get('/create/network', 'create')->name('create.network');
        Route::post('/store/network', 'store')->name('store.network');
        Route::get('/network/show/{id}', 'show')->name('show.network');
        Route::get('/network/edit/{id}', 'edit')->name('edit.network');
        Route::put('/network/update', 'update')->name('update.network');
        Route::get('/delete/network/{id}', 'delete')->name('delete.network');
    });
    Route::controller(CoinController::class)->group(function () {
        Route::get('/coins/create', 'create')->name('create.coin');
        Route::post('/coins/store', 'store')->name('store.coin');
        Route::get('/coins/{id}/show', 'show')->name('show.coin');
        Route::get('/coins/{id}/edit', 'edit')->name('edit.coin');
        Route::put('/coins/update', 'update')->name('update.coin');
        Route::get('/delete/coin/{id}', 'delete')->name('delete.coin');
    });
});
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/login', 'Login')->name('admin.login');
});
Route::controller(UserController::class)->group(function () {
    Route::get('/edit/user/{id}', 'edit')->name('edit.user');
    Route::post('/update/user', 'update')->name('update.user');
    Route::get('/change/user/password/{id}', 'changeUserPassword')->name('change.user.password');
    Route::post('/password/update', 'updatePassword')->name('user.password.update');
    Route::post('/user/register', 'userRegister')->name('register.user');
});
