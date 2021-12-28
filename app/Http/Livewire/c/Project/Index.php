<?php

namespace App\Http\Livewire\Code\Project;

use App\Models\Project;
use Livewire\Component;

// use Livewire\WithPagination;

class Index extends Component
{
    // use WithPagination;

    public $name = '';
    public $db_name = '';
    public $db_type = 'mysql';
    public $path = 'laravel/';
    public $url = '';
    public $env = '';
    public $new = true;
    public $tables = array();

    public function render()
    {
        $this->tables = '';
        return view('livewire.code.project.index', [
            'projs' => Project::with('tables')->orderBy('id', 'desc')->paginate(4),
        ])
            ->extends('layouts.app', ['title' => 'project']);
    }

}
