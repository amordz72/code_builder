<?php

namespace App\Http\Livewire\Code\Project;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        //Create Render method
        return view('livewire.code.project.create', ['title' => 'Create Project'])
        ->extends('layouts.app');
    }
}
