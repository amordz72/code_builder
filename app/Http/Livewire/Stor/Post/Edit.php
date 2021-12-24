<?php

namespace App\Http\Livewire\Stor\Post;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
          //Edit Render method
          return view('livewire.stor.post.edit', ['title' => 'Edit Post'])
          ->extends('layouts.app');
    }
}
