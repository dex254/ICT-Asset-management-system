<?php

use App\Models\Feedback;
use App\Models\Allocation;
use GuzzleHttp\Psr7\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\StaffMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Middleware\ATableMiddleware;
use App\Http\Middleware\DeviceMiddleware;
use App\Http\Middleware\STableMiddleware;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\RequestController;
use App\Http\Middleware\FeedbackMiddleware;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\FeedbackController;
use App\Http\Middleware\BroadcastMiddleware;
use App\Http\Middleware\DevreturnMiddleware;
use App\Http\Controllers\BroadcastController;
use App\Http\Middleware\AllocationMiddleware;
use App\Http\Middleware\DevrequestMiddleware;
use App\Http\Controllers\AllocationController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
                Route::get('staff/Login', [StaffController::class, 'stafflogin'])->name('staff');
                Route::post('staff/Login', [StaffController::class, 'login']);

                Route::get('admin/Login', [AdminController::class, 'adminlogin'])->name('admin');
                Route::post('admin/Login', [AdminController::class, 'login']);
});


Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
Route::middleware('staff.auth')->group(function () {
    Route::get('staff/dashboard', [StaffController::class, 'staffDashboard'])->name('staff.dashboard');
    Route::post('staff/logout', [StaffController::class, 'destroy'])->name('staff.logout');
    Route::get('staff/edit/{id}', [StaffController::class, 'edit'])->name('staff.edit');
    Route::post('staff/edit/update/{id}',[StaffController::class, 'update'])->name('staff.edit.post');
    Route::get('staff/profile',[StaffController::class, 'profile'])->name('staff.profile');
    Route::get('staff/profile/edit', [StaffController::class, 'selfedit'])->name('staff.profile.edit');
    Route::post('staff/profile/update',[StaffController::class, 'selfupdate'])->name('staff.profile.update.post');
    Route::get('staff/pass/edit', [StaffController::class, 'passedit'])->name('staff.pass.edit');
    Route::post('staff/pass/update',[StaffController::class, 'passupdate'])->name('staff.pass.update.post');
    Route::post('staff/userupdate', [StaffController::class, 'userupdate'])->name('staff.userupdate');

    Route::get('staff/myalldevs', [DeviceController::class, 'myalldev'])->middleware(DeviceMiddleware::class);
    Route::get('staff/myretdevs', [DeviceController::class, 'myretdev'])->middleware(DeviceMiddleware::class);


    Route::post('staff/devrequest/store', [RequestController::class, 'store'])->name('staff.request.store');
    Route::get('staff/request', [RequestController::class, 'devrequest'])->name('staff.request');
    Route::get('staff/requests', [RequestController::class, 'myrequests'])->middleware(DevrequestMiddleware::class);
    Route::post('staff/request/cancel/{id}', [RequestController::class, 'cancel'])->name('request.cancel');


    Route::get('staff/myallocations', [AllocationController::class, 'myallocations'])->middleware(AllocationMiddleware::class);

    Route::get('staff/myreturns', [ReturnController::class, 'myreturns'])->middleware(DevreturnMiddleware::class);

    Route::post('staff/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('staff/feedback', [FeedbackController::class, 'sendfeed'])->name('staff.feedback');
    Route::get('staff/generate-pdf', [AllocationController::class, 'generatePDF'])->name('staff.generate.pdf');
    Route::get('staff/myfeed', [FeedbackController::class, 'myfeed'])->middleware(FeedbackMiddleware::class);
    Route::get('device/staffdevices', [DeviceController::class, 'staffdevices'])->middleware(DeviceMiddleware::class);
    Route::get('device/devicedetail/{id}', [DeviceController::class, 'devicedetail'])->name('device.devicedetail');
});
Route::middleware('admin.auth')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::post('admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('admin/admins', [AdminController::class, 'admins'])->middleware(ATableMiddleware::class);
    Route::post('admin/register/store', [AdminController::class, 'store'])->name('admin.register.store');
    Route::get('admin/register',[AdminController::class, 'index'])->name('admin.register');
    Route::post('admin/add_admin/store',[AdminController::class, 'store'])->name('admin.add.store');
    Route::get('admin/add_admin',[AdminController::class, 'index2'])->name('admin.add');
    Route::get('admin/admins', [AdminController::class, 'addadmins'])->middleware(ATableMiddleware::class);
    Route::get('admin/profile',[AdminController::class, 'profile'])->name('admin.profile');
    Route::delete('admin/admin/delete{id}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::get('admin/profile/edit', [AdminController::class, 'selfedit'])->name('admin.profile.edit');
    Route::post('admin/profile/update',[AdminController::class, 'selfupdate'])->name('admin.profile.update.post');
    Route::post('admin/uadminupdate', [AdminController::class, 'uadminupdate'])->name('admin.uadminupdate');
    Route::get('/download-sql', [DatabaseController::class, 'downloadDump'])->name('downloadDump');

    Route::post('admin/add_staff/store',[StaffController::class, 'store'])->name('staff.add.store');
    Route::get('admin/add_staff',[StaffController::class, 'index2'])->name('staff.add');
    Route::get('admin/staff', [StaffController::class, 'addstaff'])->middleware(STableMiddleware::class);
    Route::delete('admin/staff/delete{id}', [StaffController::class, 'delete'])->name('staff.delete');
    Route::get('admin/staffedit/{id}', [StaffController::class, 'edit'])->name('admin.staff.update');
    Route::post('admin/staffedit/{id}',[StaffController::class, 'update'])->name('admin.staff.update.post');



    Route::post('admin/device', [DeviceController::class, 'store'])->name('device.store');
    Route::get('admin/device', [DeviceController::class, 'deviceadd'])->name('admin.device');
    Route::get('admin/devices', [DeviceController::class, 'devices'])->middleware(DeviceMiddleware::class);
    Route::delete('admin/devices/delete{id}', [DeviceController::class, 'delete'])->name('devices.delete');
    Route::get('admin/alldevices', [DeviceController::class, 'alldevices'])->middleware(DeviceMiddleware::class);
    Route::get('admin/device/update/{id}', [DeviceController::class, 'edit'])->name('admin.device.update');
    Route::post('admin/device/update/{id}',[DeviceController::class, 'update'])->name('admin.device.update.post');
    Route::get('admin/devedit/update/{id}', [DeviceController::class, 'edit'])->name('admin.devedit');
    Route::post('admin/devedit/update/{id}',[DeviceController::class, 'update'])->name('admin.devedit.update.post');
    Route::get('admin/eachdev/{id}', [DeviceController::class, 'eachdev'])->name('admin.eachdev');


    Route::get('admin/requests', [RequestController::class, 'requestview'])->middleware(DevrequestMiddleware::class);
    Route::post('admin/requests/decline/{id}', [RequestController::class, 'decline'])->name('request.decline');
    Route::post('admin/requests/allocate/{id}', [RequestController::class, 'confirmalloc'])->name('request.allocate');
    Route::get('/export/request', [RequestController::class, 'export'])->name('devrequest.export');

    Route::post('admin/allocate/{id}', [AllocationController::class, 'store'])->name('admin.allocate.store');
    Route::get('admin/allocate/{id}', [AllocationController::class, 'allocate'])->name('admin.allocate');
    Route::get('admin/get-device-info/{serial}', [AllocationController::class, 'getDeviceInfo']);
    Route::delete('admin/allocations/delete{id}', [AllocationController::class, 'delete'])->name('allocations.delete');
    Route::get('admin/allocations/update/{id}', [AllocationController::class, 'edit'])->name('admin.allocations.update');
    Route::post('admin/allocations/update/{id}',[AllocationController::class, 'update'])->name('admin.allocations.update.post');
    Route::get('admin/allocations', [AllocationController::class, 'allocations'])->middleware(AllocationMiddleware::class);
    Route::get('/export/allocations', [AllocationController::class, 'export'])->name('allocations.export');


    Route::get('admin/broadcast', [BroadcastController::class, 'broadcast'])->name('admin.broadcast');
    Route::post('admin/broadcast', [BroadcastController::class, 'store'])->name('broadcast.store');
    Route::get('admin/broadcasts', [BroadcastController::class, 'broadcastview'])->middleware(BroadcastMiddleware::class);
    Route::delete('admin/broadcasts/delete{id}', [BroadcastController::class, 'delete'])->name('broadcast.delete');
   

    Route::post('/admin/return/{id}', [ReturnController::class, 'store'])->name('admin.return');
    Route::get('admin/returns', [ReturnController::class, 'allreturns'])->middleware(DevreturnMiddleware::class);
    Route::get('/export/returns', [ReturnController::class, 'export'])->name('devreturns.export');
    Route::get('admin/feedback', [FeedbackController::class, 'allfeed'])->middleware(FeedbackMiddleware::class);
    Route::get('admin/edit/{id}', [FeedbackController::class, 'edit'])->name('admin.rep.edit');
    Route::get('admin/reply/update/{id}', [FeedbackController::class, 'edit'])->name('admin.reply.update');
    Route::post('admin/reply/update/{id}',[FeedbackController::class, 'update'])->name('admin.reply.update.post');
    Route::delete('admin/feedback/delete{id}', [FeedbackController::class, 'delete'])->name('feedback.delete');


});


