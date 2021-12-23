<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

class Index extends Component
{

    public $message;
    public $name = '';
    public function render()
    {

        $this->message = 'Hello ' . $this->name;
        return view('livewire.post.index')
            ->extends('layouts.app', ['title' => 'Posts']);
    }
    protected $rules = [

        'post.title' => 'required|string|min:6',
        'post.content' => 'required|string|max:500',
    ];

    public function save()
    {
        $this->validate();

        $this->post->save();
    }
}
