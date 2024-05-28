<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Mapel\MapelController;

Route::get('/', [AuthController::class, 'index'])->name('/');
Route::get('register', [AuthController::class, 'daftar'])->name('register');
Route::get('login', [AuthController::class, 'index'])->name('login');


Route::post('register.post', [AuthController::class, 'register'])->name('register.post');
Route::post('login', [AuthController::class, 'login'])->name('login');


Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('tambah', [HomeController::class, 'tambah'])->name('tambah');
Route::post('tambah.save', [HomeController::class, 'save'])->name('save.pengguna');


Route::get('edit.data/{id}', [HomeController::class, 'edit'])->name('edit');
Route::post('update.data/{id}', [HomeController::class, 'update'])->name('update');


Route::get('hapus.data/{id}', [HomeController::class, 'hapus'])->name('hapus');

ROute::get('mapel', [MapelController::class, 'index'])->name('mapel');
Route::get('tambah.mapel', [MapelController::class, 'tambah'])->name('tambah.mapel');

Route::post('mapel.save', [MapelController::class, 'save'])->name('save.mapel');
Route::get('editmapel/{id}', [MapelController::class, 'edit'])->name('editmapel');
Route::post('updatemapel/{id}', [MapelController::class, 'update'])->name('updatemapel');
Route::get('hapusmapel/{id}', [MapelController::class, 'hapus'])->name('hapusmapel');
