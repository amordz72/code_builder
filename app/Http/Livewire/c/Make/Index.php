<?php

namespace App\Http\Livewire\Code\Make;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.code.make.index', [
            'projs' => "Project::orderBy('id', 'desc')->paginate(4)",
        ])
            ->extends('layouts.app', ['title' => 'All Code']);
    }
}
