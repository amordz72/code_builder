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
    Route::get('/code/bank/create', App\Http\Livewire\Code\Bank\Create::class)->name('code.bank.create');

Route::get('/backups', App\Http\Livewire\backup\index::class)->name('backups');
Route::get('/Backup/create', [App\Http\Controllers\BackupController::class, 'create']
)->name("backups.create");
Route::get('/Backup/delete/{file_name}', [App\Http\Controllers\BackupController::class, 'delete']
)->name("backups.delete");
Route::get('/backups/download/{file_name}', [App\Http\Controllers\BackupController::class, 'download']
)->name("backups.download");

//c

Route::get('code/make/create', App\Http\Livewire\Code\Make\Create::class)->name('code.make.create');

Route::get('code/project', App\Http\Livewire\Code\Project\Index::class)->name('project');
Route::get('code/project/create', App\Http\Livewire\Code\Project\Create::class)->name('project.create');
Route::get('code/project/show', App\Http\Livewire\Code\Project\Edit::class)->name('project.show');
/*
Route::get('code/col', App\Http\Livewire\Code\Col\Index::class)->name('col');
Route::get('code/col/create/{id?}', App\Http\Livewire\Code\Col\Create::class)->name('col.create');
Route::get('code/col/edit/{id?}', App\Http\Livewire\Code\Col\Edit::class)->name('col.edit');
Route::get('code/col/show', App\Http\Livewire\Code\Col\Show::class)->name('col.show');

Route::get('code/data_type', App\Http\Livewire\Code\DataType\Index::class)->name('col');
Route::get('code/data_type/create', App\Http\Livewire\Code\DataType\Create::class)->name('data_type.create');


Route::get('code/table', App\Http\Livewire\Code\Table\Index::class)->name('table');
 Route::get('code/table/create/{id?}', App\Http\Livewire\Code\Table\Create::class)->name('table.create');
*/


});
