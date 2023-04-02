<?php 
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SpecializationController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\DoctorScheduleController;




/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These`
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/
Route::post('/upload/temp',[AdminController::class,'uploadImageInTemp'])->name('upload.temp');
Route::post('/delete/temp',[AdminController::class,'removeImageInTemp'])->name('delete.temp');

Route::group(['prefix' => '/'],function(){
    Route::get('/', [AdminController::class,"dashboard"])->name('dashboard');
    Route::get('/data', [AdminController::class,"getData"])->name('data-dashboard');
});

Route::group(['prefix' => 'user'],function(){
    Route::get('/', [UserController::class,"index"])->name('user');
    Route::get('/upsert/{user?}',[UserController::class,'upsert'])->name('user.upsert');
    Route::get('/filter',[UserController::class,'filter'])->name('user.filter');
    Route::post('/delete/{user}',[UserController::class,'destroy'])->name('user.delete');
    Route::post('/modify',[UserController::class,'modify'])->name('user.modify');
    Route::get('/reset',[UserController::class,'reset'])->name('user.reset');
    Route::post('/status/update',[UserController::class,'status'])->name('user.status');
    Route::post('/add-password',[UserController::class,'addpassword'])->name('user.changepassword');
});

Route::group(['prefix' => 'specialization'],function(){
    Route::get('/', [SpecializationController::class,"index"])->name('specialization');
    Route::get('/upsert/{specialization?}',[SpecializationController::class,'upsert'])->name('specialization.upsert');
    Route::get('/doctor/{specialization?}',[SpecializationController::class,'doctor'])->name('specialization.doctor');
    Route::get('/filter',[SpecializationController::class,'filter'])->name('specialization.filter');
    Route::post('/modify',[SpecializationController::class,'modify'])->name('specialization.modify');
    Route::post('/delete/{specialization}',[SpecializationController::class,'destroy'])->name('specialization.delete');
});

Route::group(['prefix' => 'schedule'],function(){
    Route::get('/', [ScheduleController::class,"index"])->name('schedule');
    Route::get('/upsert/{schedule?}',[ScheduleController::class,'upsert'])->name('schedule.upsert');
    Route::get('/filter',[ScheduleController::class,'filter'])->name('schedule.filter');
    Route::post('/modify',[ScheduleController::class,'modify'])->name('schedule.modify');
    Route::post('/delete/{schedule}',[ScheduleController::class,'destroy'])->name('schedule.delete');
});

Route::group(['prefix' => 'appointment'],function(){
    Route::get('/', [AppointmentController::class,"index"])->name('appointment');
    Route::post('/upsert/appointment',[AppointmentController::class,'modify'])->name('appointment.add');
    Route::get('/filter',[AppointmentController::class,'filter'])->name('appointment.filter');
    Route::post('/delete/{appointment}',[AppointmentController::class,'destroy'])->name('appointment.delete');
});

Route::group(['prefix' => 'doctorschedule'],function(){
    Route::get('/', [DoctorScheduleController::class,"index"])->name('doctorschedule');
    Route::get('/upsert/{doctorschedule?}',[DoctorScheduleController::class,'upsert'])->name('doctorschedule.upsert');
    Route::get('/filter',[DoctorScheduleController::class,'filter'])->name('doctorschedule.filter');
    Route::post('/modify',[DoctorScheduleController::class,'modify'])->name('doctorschedule.modify');
    Route::post('/delete/{doctorschedule}',[DoctorScheduleController::class,'destroy'])->name('doctorschedule.delete');
});


Route::group(['prefix' => 'profile'],function(){
    Route::get('/', [ProfileController::class,"index"])->name('profile');
    Route::post('/update', [ProfileController::class,"update"])->name('profile.update');
});

