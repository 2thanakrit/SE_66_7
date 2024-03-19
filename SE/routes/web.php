<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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


Route::post('/user/create', [UserController::class, 'createUserWithRoles'])->name('createWithRoles');
Route::get('/userMain', [UserController::class, 'AddAllUser'])->name('userMain');
Route::get('/userMain/search', [UserController::class, ''])->name('searchUser ');


Route::get('/leaveMain', [App\Http\Controllers\LeaveOfAbsenseController::class, 'index'])->name('leaveMain');
Route::get('/leaveMain/Create', [App\Http\Controllers\LeaveOfAbsenseController::class, 'create'])->name('leaveCreate');
Route::post('/leaveMain/Create', [App\Http\Controllers\LeaveOfAbsenseController::class, 'store'])->name('leaveStore');
Route::get('/leaveMain/search', [App\Http\Controllers\LeaveOfAbsenseController::class, 'search'])->name('searchLeave');
Route::get('/leaveDetail/{id}', [App\Http\Controllers\LeaveOfAbsenseController::class, 'detail'])->name('leaveDetail');
Route::get('/leaveDetail/{file}', [App\Http\Controllers\LeaveOfAbsenseController::class, 'download'])->name('leaveDownload');

Route::get('/Acknowledge', [App\Http\Controllers\AcknowledgeController::class, 'index']);
Route::get('/Accepted/{id}', [App\Http\Controllers\AcknowledgeController::class, 'accepted']);
});
