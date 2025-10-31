<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SalaryController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Resource Routes (Tanpa leading slash)
Route::resource('employees', EmployeeController::class); // Name: employees.index, etc.

Route::resource('department', DepartmentController::class); // Name: department.index, etc.

Route::resource('attendances', AttendanceController::class); // Name: attendances.index, etc.

Route::resource('position', PositionController::class); // Name: positions.index, etc.

Route::resource('salaries', SalaryController::class); // Name: salaries.index, etc.
