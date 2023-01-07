<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\Login;

// user 
use App\Http\Livewire\User\Dashboard as UserDashboard;
use App\Http\Livewire\User\Device as UserDevice;
use App\Http\Livewire\User\AddDevice as UserAddDevice;
use App\Http\Livewire\User\EditDevice as UserEditDevice;
use App\Http\Livewire\User\Profile as UserProfile;
use App\Http\Livewire\User\ScanDevice as UserScanDevice;

use App\Http\Livewire\User\Message as UserMessage;
use App\Http\Livewire\User\AddMessage as UserAddMessage;

use App\Http\Livewire\Docs;
use App\Http\Livewire\AddUser;

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
    Route::get('edit-device/{id}', UserEditDevice::class)->name('edit-device');
    Route::get('scan-device/{id}', UserScanDevice::class)->name('scan-device');

    Route::get('messages', UserMessage::class)->name('message');
    Route::get('add-message', UserAddMessage::class)->name('add-message');

    Route::get('docs', Docs::class)->name('docs');
    Route::get('profile', UserProfile::class)->name('profile');
    Route::get('AddUser', AddUser::class)->name('AddUser');
});
