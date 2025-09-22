<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// SIGNUP
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.post');

// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// LOGOUT
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// DASHBOARD (protected with middleware)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth.session');

Route::get('/events', function () {
    return view('events');
})->name('events')->middleware('auth.session');

Route::get('/reading', function () {
    return view('reading');
})->name('reading')->middleware('auth.session');

use App\Http\Controllers\ContactController;

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Subject
Route::get('/mapel/subject/mtk', function () {
    return view('mapel.subject.mtk');
})->name('subject.mtk');

Route::get('/mapel/subject/ipa', function () {
    return view('mapel.subject.ipa');
})->name('subject.ipa');

Route::get('/mapel/subject/ips', function () {
    return view('mapel.subject.ips');
})->name('subject.ips');

// Learning Program
Route::get('/mapel/lp/pwpb', fn() => view('mapel.lp.pwpb'))->name('lp.pwpb');
Route::get('/mapel/lp/pkwu', fn() => view('mapel.lp.pkwu'))->name('lp.pkwu');
Route::get('/mapel/lp/pg', fn() => view('mapel.lp.pg'))->name('lp.pg');

// Special Class
Route::get('/mapel/sc/mtk-peminatan', fn() => view('mapel.sc.mtk-peminatan'))->name('sc.mtkp');
Route::get('/mapel/sc/penalaran-umum', fn() => view('mapel.sc.penalaran-umum'))->name('sc.penalaran');
Route::get('/mapel/sc/persiapan-utbk', fn() => view('mapel.sc.persiapan-utbk'))->name('sc.utbk');


Route::get('/materi', function () {
    return view('materi');
})->name('materi')->middleware('auth.session');

Route::get('/teacher', function () {
    return view('teacher');
})->name('teacher')->middleware('auth.session');