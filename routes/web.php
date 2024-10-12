<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrganizerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EventController::class, 'index'])->name('main');
Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/events/master', [EventController::class, 'master'])->name('events.master');
Route::get('/events/create', [EventController::class, 'create'])->name('event.create');
Route::get('/events/edit/{event:id}', [EventController::class, 'edit'])->name('event.edit');
Route::post('/events/store', [EventController::class, 'store'])->name('event.store');
Route::put('/events/update/{event:id}', [EventController::class, 'update'])->name('event.update');
Route::delete('/events/delete/{event:id}', [EventController::class, 'delete'])->name('event.delete');
Route::get('/events/{event:id}', [EventController::class, 'show'])->name('event.show');

Route::get('/organizers', [OrganizerController::class, 'index'])->name('organizers');
Route::get('/organizers/create', [OrganizerController::class, 'create'])->name('organizer.create');
Route::get('/organizers/edit/{organizer:id}', [OrganizerController::class, 'edit'])->name('organizer.edit');
Route::get('/organizers/{organizer:id}', [OrganizerController::class, 'show'])->name('organizer.show');
Route::post('/organizers/store', [OrganizerController::class, 'store'])->name('organizer.store');
Route::put('/organizers/update/{organizer:id}', [OrganizerController::class, 'update'])->name('organizer.update');
Route::delete('/organizers/delete/{organizer:id}', [OrganizerController::class, 'delete'])->name('organizer.delete');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/categories/edit/{category:id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::get('/categories/{category:id}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
Route::put('/categories/update/{category:id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/categories/delete/{category:id}', [CategoryController::class, 'delete'])->name('category.delete');
