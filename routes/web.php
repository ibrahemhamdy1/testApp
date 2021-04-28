<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExamsController;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\SaveExamController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\CategoriesController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categories', CategoriesController::class)->except('show')->middleware('auth');
Route::resource('questions', QuestionsController::class)->except('show')->middleware('auth');
Route::resource('answers', AnswersController::class)->except('show')->middleware('auth');
Route::resource('exams', ExamsController::class)->middleware('auth');
Route::get('take-exams/{exam}', [SaveExamController::class, 'show'])->name('take-exams.show');
Route::put('save-exam/{exam}', [SaveExamController::class, 'update'])->name('save-exam');
