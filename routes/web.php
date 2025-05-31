<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authmanager;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CricketerController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [Authmanager::class, 'login'])->name('login');
Route::post('/login', [Authmanager::class, 'loginpost'])->name('login');
Route::get('/register', [Authmanager::class, 'register'])->name('register');
Route::post('/register', [Authmanager::class, 'registerpost'])->name('register');
Route::get('/dashboard', [Authmanager::class, 'dashboard'])->name('dashboard');
Route::post('/dashboard', [Authmanager::class, 'dashboardpost'])->name('dashboard');
Route::get('/logout', [Authmanager::class, 'logout'])->name('logout');
Route::get('/team', [Authmanager::class, 'createTeam'])->name('team.create');
Route::post('/team', [Authmanager::class, 'storeTeam'])->name('team.store');
Route::get('/dashboard/team/create', [Authmanager::class, 'createTeam'])->name('team.create');
Route::get('/team/list', [Authmanager::class, 'listTeams'])->name('team.list');
Route::get('/', [Authmanager::class, 'index'])->name('home');
Route::get('/cricketers/{cricketer}/edit', [Authmanager::class, 'editCricketer'])->name('cricketers.edit');
Route::put('/cricketers/{cricketer}', [Authmanager::class, 'updateCricketer'])->name('cricketers.update');

Route::get('/cricketers/ranking', [Authmanager::class, 'ranking'])->name('cricketers.ranking');
Route::get('/cricketers/by_innings', [Authmanager::class, 'showCricketersByInnings'])->name('cricketers.by.innings');
Route::get('/cricketers/by_runrate', [Authmanager::class, 'showCricketersByrunrate'])->name('cricketers.by.runrate');

