<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Models\IncomeSource;
use App\Http\Controllers\IncomeSourceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;


/*
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\UserController;
*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('index');
});


Route::get('/income-sources', [IncomeSourceController::class, 'index']);



Route::get('/blogs', function () {
    return view('blogs',['title' => '| blogs']);
});

Route::get('/contact', function () {
    return view('contact',['title'=>'| contact']);
});

Route::get('/profile', function () {
    return view('auth.profile',['title'=>'| profile']);
});


Route::get('/layout', function () {
    return view('includes.layout',['title'=>'| profile']);
});

// Route::view('index','home')->middleware('auth');

Route::view('login','Auth.login')->middleware('guest')->name('login');
Route::view('password_reset','Auth.email')->middleware('guest')->name('email');

// Route::post('authenticate',[LoginController::class,'authenticate']);


Route::get('/check-auth', function () {
    return response()->json(['isAuthenticated' => Auth::check()]);
})->name('check.auth');

Route::get('/blogs', [LoginController::class, 'blogs'])->name('blogs')->middleware('auth');
Route::get('/invoices', [LoginController::class, 'invoices'])->name('invoices')->middleware('auth');
Route::get('/subscriptions', [LoginController::class, 'subscriptions'])->name('subscriptions')->middleware('auth');
Route::get('/payment-confirmation', [LoginController::class, 'paymentConfirmation'])->name('payment.confirmation')->middleware('auth');
Route::get('/contact', [LoginController::class, 'contact'])->name('contact')->middleware('auth');

//============================= Appointment ==========================================

Route::post('/appointment', [AppointmentController::class, 'submit'])->name('appointment.submit');

//============================= User Regitration Or Login ==========================================

Route::any('/register_user', [UserController::class, 'register'])->name('register');
Route::any('/signin', [UserController::class, 'login'])->name('login');
Route::any('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('/appointments/fetch', [AppointmentController::class, 'fetchAppointments'])->name('appointments.fetch');
Route::post('/appointments/update-status/{id}/{status}', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');