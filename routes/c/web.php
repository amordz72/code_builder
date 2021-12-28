<?php

use Illuminate\Support\Facades\Route;

/*

 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::get('/make', App\Http\Livewire\Code\Make\Index::class)->name('make');
Route::get('code/make/create', App\Http\Livewire\Code\Make\Create::class)->name('code.make.create');

Route::get('code/project', App\Http\Livewire\Code\Project\Index::class)->name('project');
Route::get('code/project/create', App\Http\Livewire\Code\Project\Create::class)->name('project.create');
Route::get('code/project/show', App\Http\Livewire\Code\Project\Edit::class)->name('project.show');

Route::get('code/col', App\Http\Livewire\Code\Col\Index::class)->name('col');
Route::get('code/col/create/{id?}', App\Http\Livewire\Code\Col\Create::class)->name('col.create');
Route::get('code/col/edit/{id?}', App\Http\Livewire\Code\Col\Edit::class)->name('col.edit');
Route::get('code/col/show', App\Http\Livewire\Code\Col\Show::class)->name('col.show');

Route::get('code/data_type', App\Http\Livewire\Code\DataType\Index::class)->name('col');
Route::get('code/data_type/create', App\Http\Livewire\Code\DataType\Create::class)->name('data_type.create');


Route::get('code/table', App\Http\Livewire\Code\Table\Index::class)->name('table');
 Route::get('code/table/create/{id?}', App\Http\Livewire\Code\Table\Create::class)->name('table.create');

//Route::get('/project/show', App\Http\Livewire\Code\Project\Edit::class)->name('project.show');

Route::get('/post', App\Http\Livewire\Post\Index::class)->name('post');
Route::get('/post/show', App\Http\Livewire\Post\Show::class)->name('post.show');
