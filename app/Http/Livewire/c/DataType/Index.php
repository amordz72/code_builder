<?php

namespace App\Http\Livewire\Code\DataType;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.code.data-type.index')->extends('layouts.app', ['title' => 'All DataType']);;
    }
}
