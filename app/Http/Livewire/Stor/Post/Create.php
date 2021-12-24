<?php

namespace App\Http\Livewire\Stor\Post;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
              //Create Render method
              return view('livewire.stor.post.create', ['title' => 'Create Post'])
              ->extends('layouts.app');
    }
}
