<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\RouteController;
use App\Http\Controllers\Admin\TripController;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BookingController;




Auth::routes();

Route::get('/',[FrontendController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::group(['middleware'=>['auth','admin']],function(){
    Route::resource('location',LocationController::class);
    Route::resource('route',RouteController::class);

    Route::resource('trip',TripController::class);
    Route::post('/trip/check',[TripController::class, 'check'])->name('trip.check');
    Route::post('/trip/update',[TripController::class, 'updateTrip'])->name('trip.update');

});


Route::group(['middleware'=>['auth','passenger']],function(){
    Route::get('/search', [BookingController::class, 'search']);
    Route::get('/booking/{tripId}/{date}',[BookingController::class, 'show'])->name('create.booking');
    Route::post('/store/booking',[BookingController::class, 'store'])->name('store.booking');

    Route::get('/my-booking',[BookingController::class, 'myBookings'])->name('my.booking');
    Route::get('/remove-booking/{id}',[BookingController::class, 'removeBooking'])->name('remove.booking');

});
