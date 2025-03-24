<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Models\IncomeSource;
use App\Http\Controllers\IncomeSourceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeSectionController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\PaymentDetailsController;

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

Route::get('/about', function () {
    return view('about');
});


Route::get('/income-sources', [IncomeSourceController::class, 'index']);



Route::get('/blogs', function () {
    return view('blogs',['title' => '| blogs']);
});

Route::get('/contact', function () {
    return view('contact',['title'=>'| contact']);
});



Route::get('/layout', function () {
    return view('includes.layout',['title'=>'| profile']);
});

// Route::view('index','home')->middleware('auth');

Route::get('/login', function () {
    if (Auth::check()) {
    return redirect('/'); // Redirect logged-in users to home or dashboard
    }
    return view('Auth.login');
    })->middleware('guest')->name('login');
Route::view('password_reset','Auth.email')->middleware('guest')->name('email');
Route::view('forget_password','Auth.forget_password')->middleware('guest')->name('forget_password');
Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('password.update');
Route::post('/update-password', [UserController::class, 'updatePassword'])->name('update.password');
// Route::post('authenticate',[LoginController::class,'authenticate']);


Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blogs', [BlogController::class, 'admin'])->name('blogs');
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');


Route::get('/check-auth', function () {
    return response()->json(['isAuthenticated' => Auth::check()]);
})->name('check.auth');

// Route::get('/blogs', [LoginController::class, 'blogs'])->name('blogs')->middleware('auth');
Route::get('/invoices', [LoginController::class, 'invoices'])->name('invoices')->middleware('auth');
Route::get('/subscriptions', [LoginController::class, 'subscriptions'])->name('subscriptions')->middleware('auth');
Route::get('/payment-confirmation', [LoginController::class, 'paymentConfirmation'])->name('payment.confirmation')->middleware('auth');
// Route::get('/contact', [LoginController::class, 'contact'])->name('contact')->middleware('auth');

//============================= Appointment ==========================================

Route::post('/appointment', [AppointmentController::class, 'submit'])->name('appointment.submit');

//============================= User Regitration Or Login ==========================================

Route::any('/register_user', [UserController::class, 'register'])->name('register');
Route::any('/signin', [UserController::class, 'login'])->name('login');
Route::any('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('admin');


Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('/appointments/fetch', [AppointmentController::class, 'fetchAppointments'])->name('appointments.fetch');
Route::post('/appointments/update-status/{id}/{status}', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');


Route::get('/services', function () {
    return view('admin.services.services');
});


Route::get('/get-services', [ServiceController::class, 'getServicesList']);

Route::get('/api/services', [ServiceController::class, 'getServices']);

Route::get('/services_details', [ServiceController::class, 'index']);
Route::post('/services_details', [ServiceController::class, 'store']);
Route::get('/services_details/{id}/edit', [ServiceController::class, 'edit']);
Route::post('/services_update/{id}', [ServiceController::class, 'update']);
Route::post('/services_delete/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');


Route::get('/income_details', [IncomeController::class, 'index'])->name('admin.incomes.index');
Route::get('/admin/income-data', [IncomeController::class, 'getData'])->name('admin.incomes.data');

// Route::get('/admin/income-data', [IncomeController::class, 'getIncomeData'])->name('income.list');
Route::get('/income-form', [IncomeController::class, 'showForm'])->name('income.form');
Route::post('/submit-income-form', [IncomeController::class, 'submitForm'])->name('submit.income.form');
Route::post('/admin/income/update-status/{id}', [IncomeController::class, 'updateStatus'])->name('income.updateStatus');



Route::get('/slider', [HomeSectionController::class, 'show']);
Route::get('/add_slider', function () {
    return view('admin.update_home.update_home');
})->middleware('admin');
Route::post('/upload-banner', [HomeSectionController::class, 'store']);


Route::get('/admin/banner-upload', [HomeSectionController::class, 'create'])->name('admin.banner.upload');

Route::post('/admin/upload-banner', [HomeSectionController::class, 'store'])->name('admin.upload-banner');

Route::post('/submit-rating', [RatingController::class, 'submit'])->name('submit.rating');

Route::middleware(['auth'])->group(function () {
    Route::post('/rate-us', [RatingController::class, 'store'])->name('ratings.store');
});
Route::get('/ratings', [RatingController::class, 'getRatings']);


Route::get('/admin/payment-details', [PaymentDetailsController::class, 'index'])->name('payment.details.index');
Route::get('/admin/payment-details/fetch', [PaymentDetailsController::class, 'fetch'])->name('payment.details.fetch');
Route::post('/admin/payment-details/add', [PaymentDetailsController::class, 'store'])->name('payment.details.store');
Route::delete('/admin/payment-details/delete', [PaymentDetailsController::class, 'destroy'])->name('payment.details.destroy');

Route::get('/accountant', function () {
return view('account');
});