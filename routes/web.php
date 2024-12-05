<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\ContactController;

Route::get('/', [ContactController::class, 'showForm'])->name('contact.form');


Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');