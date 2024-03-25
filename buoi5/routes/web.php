<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MajorsController;
use App\Http\Controllers\StudentsController;

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
    return view('welcome');
});

Route::group([
    'prefix' => 'majors',
], function () {
    Route::get('/', [MajorsController::class, 'index'])
         ->name('majors.major.index');
    Route::get('/create', [MajorsController::class, 'create'])
         ->name('majors.major.create');
    Route::get('/show/{major}',[MajorsController::class, 'show'])
         ->name('majors.major.show')->where('id', '[0-9]+');
    Route::get('/{major}/edit',[MajorsController::class, 'edit'])
         ->name('majors.major.edit')->where('id', '[0-9]+');
    Route::post('/', [MajorsController::class, 'store'])
         ->name('majors.major.store');
    Route::put('major/{major}', [MajorsController::class, 'update'])
         ->name('majors.major.update')->where('id', '[0-9]+');
    Route::delete('/major/{major}',[MajorsController::class, 'destroy'])
         ->name('majors.major.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'students',
], function () {
    Route::get('/', [StudentsController::class, 'index'])
         ->name('students.student.index');
    Route::get('/create', [StudentsController::class, 'create'])
         ->name('students.student.create');
    Route::get('/show/{student}',[StudentsController::class, 'show'])
         ->name('students.student.show')->where('id', '[0-9]+');
    Route::get('/{student}/edit',[StudentsController::class, 'edit'])
         ->name('students.student.edit')->where('id', '[0-9]+');
    Route::post('/', [StudentsController::class, 'store'])
         ->name('students.student.store');
    Route::put('student/{student}', [StudentsController::class, 'update'])
         ->name('students.student.update')->where('id', '[0-9]+');
    Route::delete('/student/{student}',[StudentsController::class, 'destroy'])
         ->name('students.student.destroy')->where('id', '[0-9]+');
});
