<?php

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

Route::get('/', function () {
  return view('welcome');
});

use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
  return redirect('/dashboard');
})->middleware('auth');
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [UserController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

  Route::group(['middleware' => 'admin'], function () {
    Route::get('/user-management', [PageController::class, 'userManagement']);
    Route::post('/user-management/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::delete('/user-management/{id}', [UserController::class, 'destroy'])->name('user.destroy');
  });

  Route::group(['middlware' => 'teacher'], function () {
    Route::get('/mytests', [PageController::class, 'mytests'])->name('mytests');
    Route::get('/create', [PageController::class, 'createTest'])->name('create-test');
    Route::get('/{id}', [TestController::class, 'edit'])->name('edit-test');
    Route::post('/update-test', [TestController::class, 'update'])->name('update-test');
    Route::get('/delete/{id}', [PageController::class, 'deleteTest'])->name('delete-test');
    Route::post('/save', [TestController::class, 'store'])->name('save-test');
  });

  Route::group(['middlware' => 'candidat'], function () {
    Route::get('/tests', [PageController::class, 'tests'])->name('tests');
  });

  Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
  Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
  Route::get('/{page}', [PageController::class, 'index'])->name('page');
  Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
