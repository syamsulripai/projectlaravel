<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\ProjectsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index']);
Route::get('/projects', [ProjectsController::class,'index'])->name('projects');
Route::get('/projects/{id}', [ProjectsController::class,'show'])->name('projects.show');

//Halaman utama
Route::get('/', function () {
    return view('pages.home');  
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', function () {
    return redirect()->route('contact')->with('succses','pesan berhasil dikirim!');
})->name('contact.submit');

Route::get('/logout', function () {
    session()->flush();
    return redirect('/');
})->name('logout');

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('admin.home');
    })->name('admin.dashboard');

    Route::resource('projects', AdminProjectController::class);

    Route::get('projects/pdf', [AdminProjectController::class, 'cetakPdf'])
        ->name('projects.pdf');

    Route::get('/users', [UserController::class, 'index'])
        ->name('admin.users');

});