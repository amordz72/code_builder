<?php

namespace App\Http\Livewire\Test\Category;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {

                                    //Edit Render method
                                    return view('livewire.test.category.edit', ['title' => 'Edit Category'])
                                    ->extends('layouts.app');

    }
}
