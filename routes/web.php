<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorScheduleController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeLeaveController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\ProvidentFundController;
use App\Http\Controllers\StaffSalaryController;

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
Route::get('/edit-patient/{id}',[PatientController::class,'editPatient']);
Route::post('/update-patient',[PatientController::class,'updatePatient'])->name('update.patient');
Route::get('/delete-patient/{id}',[PatientController::class,'deletePatient']);

//for department
Route::get('/department-list',[DepartmentController::class,'departmentList']);
Route::get('/add-department',[DepartmentController::class,'addDepartment']);
Route::post('/store-department',[DepartmentController::class,'store'])->name('store.department');
Route::get('/status-update/{id}',[DepartmentController::class,'updateStatus'])->name('status.update');
Route::get('/edit-department/{id}',[DepartmentController::class,'editDepartment'])->name('edit.department');
Route::post('/update-department',[DepartmentController::class,'updateDepartment'])->name('update.department');
Route::get('/delete-department/{id}',[DepartmentController::class,'deleteDepartment'])->name('status.update');

//for appointment
Route::get('/appointment-list',[AppointmentController::class,'appointmentList']);
Route::get('/add-appointment',[AppointmentController::class,'addAppointment']);
Route::get('/findPatientEmail',[AppointmentController::class,'findPatientEmail']);
Route::post('/store-appointment',[AppointmentController::class,'store'])->name('store.appointment');
Route::get('/delete-appointment/{id}',[AppointmentController::class,'deleteAppointment']);
//for doctor schedule
Route::get('/doctor-schedule',[DoctorScheduleController::class,'doctorScheduleList']);
Route::get('/add-doctorSchedule',[DoctorScheduleController::class,'addDoctorSchedule']);
Route::post('/store-doctorSchedule',[DoctorScheduleController::class,'store'])->name('store.doctorSchedule');
Route::get('/schedule-update/{id}',[DoctorScheduleController::class,'updateStatus'])->name('schedule.update');
Route::get('/edit-schedule/{id}',[DoctorScheduleController::class,'editSchedule'])->name('edit.schedule');
Route::post('/update-doctorSchedule',[DoctorScheduleController::class,'updateDoctorSchedule'])->name('update.doctorSchedule');
Route::get('/delete-schedule/{id}',[DoctorScheduleController::class,'deleteSchedule'])->name('delete.schedule');
//for employee
Route::get('/employee-list',[EmployeeController::class,'employeeList']);
Route::get('/add-employee',[EmployeeController::class,'addEmployee']);
Route::post('/store-employee',[EmployeeController::class,'store'])->name('store.employee');
Route::get('/edit-employee/{id}',[EmployeeController::class,'editEmployee'])->name('edit.employee');
Route::post('/update-employee',[EmployeeController::class,'updateEmployee'])->name('update.employee');
Route::get('/delete-employee/{id}',[EmployeeController::class,'deleteEmployee'])->name('delete.employee');
//for employeeleave
Route::get('/employee-leave-list',[EmployeeLeaveController::class,'employeeLeaveList']);
Route::get('/add-employee-leave',[EmployeeLeaveController::class,'addEmployeeLeaveList']);
Route::post('/store-employee-leave',[EmployeeLeaveController::class,'store'])->name('store.leave');
Route::get('/leave-approved/{id}',[EmployeeLeaveController::class,'approved'])->name('leave.approved');
Route::get('/edit-leave/{id}',[EmployeeLeaveController::class,'editLeave'])->name('leave.approved');
Route::post('/update-employee-leave',[EmployeeLeaveController::class,'updateEmployeeLeave'])->name('update.leave');
Route::get('/delete-leave/{id}',[EmployeeLeaveController::class,'deleteLeave'])->name('delete.leave');
//for holiday
Route::get('/holiday-list',[HolidayController::class,'holidayList']);
Route::get('/add-holiday',[HolidayController::class,'addHoliday']);
Route::post('/store-holiday',[HolidayController::class,'store'])->name('store.holiday');
Route::get('/edit-holiday/{id}',[HolidayController::class,'editHoliday']);
Route::post('/update-holiday',[HolidayController::class,'updateHoliday'])->name('update.holiday');
//for expenses
Route::get('/expense-list',[ExpenseController::class,'expenseList']);
Route::get('/add-expense',[ExpenseController::class,'addExpense']);
Route::post('/store-expense',[ExpenseController::class,'store'])->name('store.expense');
Route::get('/edit-expense/{id}',[ExpenseController::class,'editExpense']);
Route::post('/update-expense',[ExpenseController::class,'updateExpense'])->name('update.expense');
Route::get('/delete-expense/{id}',[ExpenseController::class,'deleteExpense']);
//tax list
Route::get('/tax-list',[TaxController::class,'taxList']);
Route::get('/add-tax',[TaxController::class,'addList']);
Route::post('/store-tax',[TaxController::class,'store'])->name('store.tax');
Route::get('/edit-tax/{id}',[TaxController::class,'editTax']);
Route::post('/update-tax',[TaxController::class,'updateTax'])->name('update.tax');
Route::get('/delete-tax/{id}',[TaxController::class,'deleteTax']);
//provident fund
Route::get('/providentfund-list',[ProvidentFundController::class,'providentFundList']);
Route::get('/add-provident-fund',[ProvidentFundController::class,'addProvidentFund']);
Route::post('/store-provident-fund',[ProvidentFundController::class,'store'])->name('store.providentfund');
Route::get('/employee-profile/{id}',[ProvidentFundController::class,'employeeProfile']);
Route::get('/edit-provident-fund/{id}',[ProvidentFundController::class,'editProvidentFund']);
Route::post('/update-provident-fund',[ProvidentFundController::class,'updateProvidentFund'])->name('update.providentfund');
Route::get('/delete-provident-fund/{id}',[ProvidentFundController::class,'deleteProvidentFund']);
//staff salary 
Route::get('/staff-salary-list',[StaffSalaryController::class,'staffSalaryList']);
