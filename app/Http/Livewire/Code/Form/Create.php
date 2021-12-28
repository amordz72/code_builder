<?php

namespace App\Http\Livewire\Code\Form;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
       //Create Render method
       return view('livewire.code.form.create', ['title' => 'Create Form'])
       ->extends('layouts.app');
    }
}
