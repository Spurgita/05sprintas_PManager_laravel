<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');
// Route::get('/Projects', function () {
//     return view('projects');
// })->name('projects');
// Route::get('/Employees', function () {
//     return view('employees');
// })->name('employees');

use App\Http\Controllers\ProjectController;

Route::get('/Projects', 'App\Http\Controllers\ProjectController@index')->name('projects.index');
Route::get('/Projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
Route::post('/Projects', [ProjectController::class, 'store']);
Route::put('/Projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/Projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');

use App\Http\Controllers\EmployeesController;

Route::get('/Employees', 'App\Http\Controllers\EmployeesController@index')->name('employees.index');
Route::get('/Employees/{id}', [EmployeesController::class, 'show'])->name('employees.show');
Route::post('/Employees', [EmployeesController::class, 'store']);
Route::put('/Employees/{id}', [EmployeesController::class, 'update'])->name('employees.update');
Route::delete('/Employees/{id}', [EmployeesController::class, 'destroy'])->name('employees.destroy');
