<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Auth\Login;

// user 
use App\Http\Livewire\User\Dashboard as UserDashboard;
use App\Http\Livewire\User\Device as UserDevice;
use App\Http\Livewire\User\AddDevice as UserAddDevice;
use App\Http\Livewire\User\EditDevice as UserEditDevice;
use App\Http\Livewire\User\Profile as UserProfile;
use App\Http\Livewire\User\ChangePassword as UserChangePassword;
use App\Http\Livewire\User\ScanDevice as UserScanDevice;

use App\Http\Livewire\User\Message as UserMessage;
use App\Http\Livewire\User\AddMessage as UserAddMessage;

use App\Http\Livewire\User\Contact as UserContact;
use App\Http\Livewire\User\AddContact as UserAddContact;
use App\Http\Livewire\User\EditContact as UserEditContact;
use App\Http\Livewire\User\Group as UserGroup;

use App\Http\Controllers\ExcelController;

use App\Http\Livewire\Docs;

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

Route::get('/', Login::class)->name('login');

// middleware('auth') is required to access the dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', UserDashboard::class)->name('dashboard');
    Route::get('devices', UserDevice::class)->name('device');
    Route::get('add-device', UserAddDevice::class)->name('add-device');
    Route::get('edit-device/{id}', UserEditDevice::class)->name('edit-device');
    Route::get('scan-device/{id}', UserScanDevice::class)->name('scan-device');

    Route::get('messages', UserMessage::class)->name('message');
    Route::get('add-message', UserAddMessage::class)->name('add-message');

    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', UserContact::class)->name('contact');
        Route::get('add', UserAddContact::class)->name('add-contact');
        Route::get('edit/{id}', UserEditContact::class)->name('edit-contact');
        Route::get('group', UserGroup::class)->name('group');
    });

    Route::post('import-contact', [ExcelController::class, 'importContact'])->name('import-contact');

    Route::get('docs', Docs::class)->name('docs');
    Route::get('profile', UserProfile::class)->name('profile');
    Route::get('change-password', UserChangePassword::class)->name('change-password');
});
