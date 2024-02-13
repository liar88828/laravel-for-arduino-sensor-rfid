<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\SensorController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');

    Route::get('/register', 'register')->name('register');
    Route::post('/create', 'store')->name('create');

    Route::get('/profile/', 'profile')->name('profile');
    Route::get('/profile_check/{id}', 'profileCheck')->name('profile.check');
    Route::get('/logout', 'logout')->name('logout');
//    --------

    Route::get('/list', 'list')->name('list.user');
    Route::get('/edit/{id}', 'edit')->name('edit.user');
    // -----
    Route::put('/update/{id}', 'update')->name('update.user');
    Route::delete('/delete/{id}', 'destroy')->name('destroy.user');

});


Route::prefix('/anggota')->group(function () {
//    Route::middleware('auth')->group(function () {
    Route::controller(AnggotaController::class)->group(function () {
        //view
        Route::get('/', 'index')->name('anggota.index');
        Route::get('/detail/{id}', 'show')->name('anggota.show');
        Route::get('/create', 'create')->name('anggota.create');
        Route::get('/edit/{id}', 'edit')->name('anggota.edit');
        Route::get('/pilih/{id}', 'pilih')->name('anggota.pilih');
        //model
        Route::post('/store', 'store')->name('anggota.store');
        Route::put('/update/{id}', 'update')->name('anggota.update');
        Route::put('/konfirmasi/{id}', 'konfirmasi')->name('anggota.konfirmasi');
        Route::delete('/destroy/{id}', 'destroy')->name('anggota.destroy');
    });
});
//});

Route::prefix('/record')->group(function () {
//    Route::middleware('auth')->group(function () {
    Route::controller(RecordController::class)->group(function () {
        //view
        Route::get('/', 'index')->name('record.index');
        Route::get('/detail/{id}', 'show')->name('record.show');
        Route::get('/create', 'create')->name('record.create');
        Route::get('/edit/{id}', 'edit')->name('record.edit');
        //model
        Route::post('/store', 'store')->name('record.store');
        Route::put('/update/{id}', 'update')->name('record.update');
        Route::delete('/destroy/{id}', 'destroy')->name('record.destroy');
    });
});
//});


// absen
Route::prefix('/absen')->group(function () {
//    Route::middleware('auth')->group(function () {
    Route::controller(RecordController::class)->group(function () {
        // view
//            Route::get('/', 'index')->name('absen.index');
//            Route::get('/list', 'list')->name('absen.list');
//            Route::get('/detail/{id}', 'show')->name('absen.show');
//            Route::get('/create', 'create')->name('absen.create');
//            Route::get('/edit/{id}', 'edit')->name('absen.edit');
//            // model
//            Route::post('/store', 'store')->name('absen.store');
//            Route::put('/update/{id}', 'update')->name('absen.update');
//            Route::delete('/destroy/{id}', 'destroy')->name('absen.destroy');

//            //view
//            Route::get('/', 'index')->name('buku.index');
//            Route::get('/list', 'list')->name('buku.list');
//            Route::get('/detail/{id}', 'show')->name('buku.show');
//            Route::get('/create', 'create')->name('buku.create');
//            Route::get('/edit/{id}', 'edit')->name('buku.edit');
//            //model
//            Route::post('/store', 'store')->name('buku.store');
//            Route::put('/update/{id}', 'update')->name('buku.update');
//            Route::delete('/destroy/{id}', 'destroy')->name('buku.destroy');
    });
//    });
});


Route::prefix('/sensor')->group(function () {
//    Route::middleware('auth')->group(function () {
    Route::controller(SensorController::class)->group(function () {
        //view
        Route::get('/', 'index')->name('sensor.index');
        Route::get('/detail/{id}', 'show')->name('sensor.show');
        Route::get('/create', 'create')->name('sensor.create');
        Route::get('/edit/{id}', 'edit')->name('sensor.edit');
        //model
        Route::post('/store', 'store')->name('sensor.store');
        Route::put('/update/{id}', 'update')->name('sensor.update');
        Route::delete('/destroy/{id}', 'destroy')->name('sensor.destroy');
    });
});
//});


//Route::prefix('/absensi')->group(function () {
//    Route::controller(RecordController::class)->group(function () {
//        Route::get('/', 'index');
//        Route::get('/{rfid}', 'show');
//        Route::post('/', 'store');
//        Route::put('/{rfid}', 'update');
//        Route::delete('/{rfid}', 'destroy');
//    });
//});




