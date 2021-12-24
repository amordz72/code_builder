<?php

namespace App\Http\Livewire\Stor\Post;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
           //Show Render method
           return view('livewire.stor.post.show', ['title' => 'Show Post'])
           ->extends('layouts.app');
    }
}
