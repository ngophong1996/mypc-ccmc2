<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\Controller;
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



Route::get('admin/login', function(){
    return view('admin.login');
});
Route::post('admin/login', [AdminController::class, 'loginPost'])->name('admin.loginPost');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin'])->group(function (){
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/static', [AdminController::class, 'static'])->name('admin.static');
    Route::get('admin/listing/{model}', [ListingController::class, 'index'])->name('listing.index');
});




Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/home', function () {
    return view('home');
})->middleware(['verified']);
/*-----email_verify----*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::controller(PageController::class)->group(function () {
    Route::get('/none', 'none')->name('none');
    Route::get('/new', 'new')->name('new');
    Route::get('/old', 'old')->name('old');
    Route::get('/rent', 'rent')->name('rent');
    Route::get('/mypc', 'mypc')->middleware(['auth', 'verified'])->name('mypc');
    Route::get('/wifi', 'wifi')->middleware(['auth', 'verified'])->name('wifi');
    Route::get('/mess', 'mess')->middleware(['auth', 'verified'])->name('mess');

});

Route::delete('/mypc/{id}',[PageController::class, 'mypcdestroy'])->name('mypc.destroy');
Route::post('/wifipost', [PageController::class, 'wifipost'])->middleware(['auth', 'verified'])->name('wifipost');
Route::post('/mypcpost', [PageController::class, 'mypcpost'])->middleware(['auth', 'verified'])->name('mypcpost');
Route::post('/billpost', [PageController::class, 'billpost'])->middleware(['auth', 'verified'])->name('billpost');
Route::post('/messpost', [PageController::class, 'messpost'])->middleware(['auth', 'verified'])->name('messpost');
Route::post('/checkbill', [PageController::class, 'checkbill'])->name('checkbill');
Route::post('/wifisent', [PageController::class, 'wifisent'])->name('wifisent');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
