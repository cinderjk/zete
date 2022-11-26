<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\Login;

// user 
use App\Http\Livewire\User\Dashboard as UserDashboard;
use App\Http\Livewire\User\Device as UserDevice;
use App\Http\Livewire\User\AddDevice as UserAddDevice;
use App\Http\Livewire\User\ScanDevice as UserScanDevice;


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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('login', Login::class)->name('login');

// middleware('auth') is required to access the dashboard
Route::middleware(['auth'])->prefix('app')->group(function () {
    Route::get('dashboard', UserDashboard::class)->name('dashboard');
    Route::get('devices', UserDevice::class)->name('device');
    Route::get('add-device', UserAddDevice::class)->name('add-device');
    Route::get('scan-device/{id}', UserScanDevice::class)->name('scan-device');
});
