<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;


// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::post('/login', [LoginController::class, 'login'])->name("login");


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
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/service', function () {
    return view('service');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
});
Route::get('/dashboard/loans', [LoanController::class, 'showLoans'])->name('dashboard.loans');
Route::post('/loans/personalapply', [LoanController::class, 'store'])->name('loan.apply.personal');

});

Route::get('/login', function () {
    return view('login');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/edit', function () {
    return view('edit');
});


Route::get('/process_signup', [Controller::class, 'create']);
Route::post('/process_signup', [UserController::class, 'store']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
Route::patch('/profile/update', [DashboardController::class, 'update_profile'])->name('profile.update');





// Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/logout', function () {
    // Auth::logout();
    return redirect('/login');
});
    
Route::get('/dashboard/loans/{loan}/edit', [LoanController::class, 'update'])->name('update.loan.edit');

Route::delete('/dashboard/loans/{loan}', [LoanController::class, 'destroy'])->name('delete.loan');
