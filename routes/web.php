<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;

// ROTTE GUEST
Route::get('/', [PublicController::class,'welcome'])->name('home');
Route::get('/category/{category}', [PublicController::class, 'categoryIndex'])->name('categoryIndex');
Route::get('/announcement/user/{user}', [PublicController::class, 'userIndex'])->name('userIndex');
Route::get('/announcement/platform/{announcement}', [PublicController::class, 'platformIndex'])->name('platformIndex');
Route::get('/team',[PublicController::class, 'team'])->name('team');

// ROTTE AUTH ANNUNCI
Route::get('/announcement/create',[AnnouncementController::class,'create'])->name('announcement.create')->middleware('auth');
Route::get('/announcement/index',[AnnouncementController::class,'index'])->name('announcement.index');
Route::get('/announcement/show/{announcement}',[AnnouncementController::class,'show'])->name('announcement.show');
Route::get('/announcement/edit/{announcement}',[AnnouncementController::class,'edit'])->name('announcement.edit')->middleware('auth');
// Route::get('/announcement/deleteImg/{image}',[AnnouncementController::class,'deleteImg'])->name('deleteImg')->middleware('auth');

// ROTTE REVISORI
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accept/announcement/{announcement}',[RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');
Route::patch('/reject/announcement/{announcement}',[RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');
Route::patch('/undo/announcement/{announcement}',[RevisorController::class, 'undoAnnouncement'])->middleware('isRevisor')->name('revisor.undo_announcement');

//ROTTE CANDIDATURE
Route::get('/revisor/request',[RevisorController::class, 'revisorRequest'])->middleware('auth')->name('revisor.request');
Route::get('/become/revisor', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/make/revisor/{user}',[RevisorController::class, 'makeRevisor'])->name('make.revisor');

// ROTTE RICERCHE ANNUNCI
Route::get('/search/announcement', [PublicController::class,'searchAnnouncements'])->name('announcements.search');

//ROTTE LINGUA
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('setLocale');

//ROTTE UTENTE
Route::get('user/myannouncement', [UserController::class, 'index'])->middleware('auth')->name('user.myAnnouncements');



// ROTTA TEST DAVIDE
Route::get('/test',[PublicController::class,'testMail']);