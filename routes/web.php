<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/code/make/index', App\Http\Livewire\Code\Make\Index::class)->name('code.make.index');
    Route::get('/code/make/create', App\Http\Livewire\Code\Make\Create::class)->name('code.make.create');
    Route::get('/code/make/edit/{id?}', App\Http\Livewire\Code\Make\Edit::class)->name('code.make.edit');
    Route::get('/code/make/show/{id?}', App\Http\Livewire\Code\Make\Show::class)->name('code.make.show');

    Route::get('/code/project/index', App\Http\Livewire\Code\Project\Index::class)->name('code.project.index');
    Route::get('/code/project/create', App\Http\Livewire\Code\Project\Create::class)->name('code.project.create');
    Route::get('/code/project/edit/{id?}', App\Http\Livewire\Code\Project\Edit::class)->name('code.project.edit');
    Route::get('/code/project/show/{id?}', App\Http\Livewire\Code\Project\Show::class)->name('code.project.show');
    



    Route::get('/stor/post/index', App\Http\Livewire\Stor\Post\Index::class)->name('stor.post.index');
    Route::get('/stor/post/create', App\Http\Livewire\Stor\Post\Create::class)->name('stor.post.create');
    Route::get('/stor/post/edit/{id?}', App\Http\Livewire\Stor\Post\Edit::class)->name('stor.post.edit');
    Route::get('/stor/post/show/{id?}', App\Http\Livewire\Stor\Post\Show::class)->name('stor.post.show');


    Route::get('/code/bank/index', App\Http\Livewire\Code\Bank\Index::class)->name('code.bank.index');


});
