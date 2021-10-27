<?php

use App\Http\Controllers\SubjectController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/test', [SubjectController::class,'index']) ->name('Test');
Route::middleware(['auth:sanctum', 'verified'])->post('/test', [SubjectController::class,'store']);

Route::middleware(['auth:sanctum', 'verified'])->get('/showSubject', [SubjectController::class,'show']) ->name('ShowSubject');
Route::middleware(['auth:sanctum', 'verified'])->get('/showSubject/{id}', [SubjectController::class,'showSub']);
Route::middleware(['auth:sanctum', 'verified'])->delete('/showSubject/{id}', [SubjectController::class,'delete']);
Route::middleware(['auth:sanctum', 'verified'])->get('/showSubject/edit/{id}', [SubjectController::class,'edit']);

Route::middleware(['auth:sanctum', 'verified'])->get('/showSubject/check/{id}', [SubjectController::class,'check']);
Route::middleware(['auth:sanctum', 'verified'])->post('/showSubject/apply/{id}', [SubjectController::class,'apply']);
Route::middleware(['auth:sanctum', 'verified'])->post('/showSubject/disApply/{id}', [SubjectController::class,'disApply']);
