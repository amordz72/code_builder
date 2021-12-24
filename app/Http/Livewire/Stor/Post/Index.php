<?php

namespace App\Http\Livewire\Stor\Post;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        //Index Render method
        return view('livewire.stor.post.index', ['title' => 'All Post'])
            ->extends('layouts.app');

    }
}
