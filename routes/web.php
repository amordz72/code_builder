<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post', App\Http\Livewire\Post\Index::class);
Route::get('/make', App\Http\Livewire\Code\Make::class);

Route::get('/code/bank/index', App\Http\Livewire\Code\Bank\Index::class)->name('code.bank.index');
Route::get('/code/bank/create', App\Http\Livewire\Code\Bank\Create::class)->name('code.bank.create');
// // Route::get('/code/bank', App\Http\Livewire\Code\Bank\Edit::class)->name('code.bank.edit');
// Route::get('/code/bank', App\Http\Livewire\Code\Bank\ Show::class)->name('code.bank.show');
