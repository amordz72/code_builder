<?php

namespace App\Http\Livewire\Test\Category;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
             //Index Render method
             return view('livewire.test.category.index', ['title' => 'All Category'])
             ->extends('layouts.app');
    }
}
