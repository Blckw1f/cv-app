<?php

use App\Http\Controllers\CVController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UniversityController;

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/find', [SearchController::class, 'index'])->name('find');
Route::post('/search', [SearchController::class, 'search'])->name('search');
Route::post('/university', [UniversityController::class, 'store'])->name('store-university');
Route::post('/skill', [SkillController::class, 'store'])->name('store-skill');
Route::post('/person', [PersonController::class, 'store'])->name('store-person');
Route::post('/cv', [CVController::class, 'store'])->name('store-cv');
