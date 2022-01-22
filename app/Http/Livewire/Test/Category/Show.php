<?php

namespace App\Http\Livewire\Test\Category;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {

                                    //Show Render method
                                    return view('livewire.test.category.show', ['title' => 'Show Category'])
                                    ->extends('layouts.app');
    }
}
