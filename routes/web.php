<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AppointmentController;

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
    return view('auth.login');
});

Auth::routes();
//for doctor route
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
Route::get('/doctor-list',[DoctorController::class,'doctor_list'])->name('doctor.list');
Route::get('/doctor-add',[DoctorController::class,'doctor_add'])->name('doctor.add');
Route::post('/store-doctor',[DoctorController::class,'store'])->name('store.doctor');
Route::get('/edit-doctor/{id}',[DoctorController::class,'editDoctor'])->name('edit.doctor');
Route::post('/update-doctor',[DoctorController::class,'updateDoctor'])->name('update.doctor');
Route::get('/delete-doctor/{id}',[DoctorController::class,'deleteDoctor']);
//for patient route
Route::get('/patient-list',[PatientController::class,'patientList']);
Route::get('/add-patient',[PatientController::class,'addPatient']);
Route::post('/store-patient',[PatientController::class,'store'])->name('store.patient');

//for department
Route::get('/department-list',[DepartmentController::class,'departmentList']);
Route::get('/add-department',[DepartmentController::class,'addDepartment']);
Route::post('/store-department',[DepartmentController::class,'store'])->name('store.department');
Route::get('/status-update/{id}',[DepartmentController::class,'updateStatus'])->name('status.update');

//for appointment
Route::get('/appointment-list',[AppointmentController::class,'appointmentList']);
Route::get('/add-appointment',[AppointmentController::class,'addAppointment']);
Route::get('/findPatientEmail',[AppointmentController::class,'findPatientEmail']);
Route::post('/store-appointment',[AppointmentController::class,'store'])->name('store.appointment');




