<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Middleware\ATableMiddleware;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ProfileController;

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
    return view('staff.Login');
});
Route::get('/Register', function () {
    return view('staff.register');
});

Route::get('/AdminLogin', function () {
    return view('admin.login');
});

Route::get('/admin', function () {
    return view('manage.admins');
});

Route::get('/each', function () {
    return view('admin.eachdev');
});







Route::post('staff/register', [StaffController::class, 'store'])->name('staff.store');




Route::post('staff/store', [DeviceController::class, 'store'])->name('device.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
