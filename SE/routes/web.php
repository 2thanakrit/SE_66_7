<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveOfAbsenseController;
use App\Http\Controllers\AcknowledgeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CrudController;
use App\Models\User;

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
Route::middleware(['guest'])->group(function () {

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login');

//layout
Route::get('/layoutV2', function () {
    return view('layoutV2');
});
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register');


Route::middleware(['auth'])->group(function () {

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');    
Route::delete('/logout',[AuthController::class, 'logout'])->name('logout');


Route::get('/user/edit/{id}', [UserController::class, 'indexEdit'])->name('userEdit');
Route::post('/user/create', [UserController::class, 'userStore'])->name('userStore');
Route::put('/user/update/{id}', [UserController::class, 'userUpdate'])->name('userUpdate');
Route::get('/userMain', [UserController::class, 'index'])->name('userMain');
Route::get('/userMain/search', [UserController::class, 'searchUser'])->name('searchUser');
Route::delete('/user/delete/{id}', [UserController::class, 'userDelete'])->name('userDelete');

Route::get('/leaveMain', [LeaveOfAbsenseController::class, 'index'])->name('leaveMain');
Route::get('/leaveMain/Create', [LeaveOfAbsenseController::class, 'create'])->name('leaveCreate');
Route::post('/leaveMain/Create', [LeaveOfAbsenseController::class, 'store'])->name('leaveStore');
Route::get('/leaveMain/search', [LeaveOfAbsenseController::class, 'search'])->name('searchLeave');
Route::get('/leaveDetail/{id}', [LeaveOfAbsenseController::class, 'detail'])->name('leaveDetail');
Route::get('/leaveDetail/{file}', [LeaveOfAbsenseController::class, 'download'])->name('leaveDownload');

Route::get('/acknowledge', [AcknowledgeController::class, 'index'])->name('ackindex');
Route::get('/search', [AcknowledgeController::class,'search']);
Route::get('/acknowledge/{id}', [AcknowledgeController::class,'acknowledge'])->name('accept');
Route::get('/acknowledge/detail/{id}', [AcknowledgeController::class,'show'])->name('ackdetail');
Route::get('/acknowledge/detail/{file}', [AcknowledgeController::class,'download'])->name('ackdownload');

Route::get('/Attendance', [AttendanceController::class, 'showAllatten'])->name('display.attendance');

Route::get('/display/leaveofabsences',[CrudController::class,'showAllLeaveofabsences']);
Route::get('/edit/leaveofabsences',[CrudController::class,'editLeave'])->name('editLeave');
Route::get('/leaveofabsences/search', [CrudController::class, 'search'])->name('searchLeaveHis');
Route::get('/add/leaveofabsences',[CrudController::class,'addLeave'])->name('addLeave');
Route::get('/leaveDetail/{id}', [CrudController::class, 'detail'])->name('leaveDetail');

Route::middleware(['auth', 'role:ผู้ดูแลระบบ'])->group(function () {
    // Your routes here
    Route::get('/user/create', [UserController::class, 'indexCreate'])->name('createUser');
});

});
