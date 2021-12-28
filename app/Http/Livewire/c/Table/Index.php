<?php

namespace App\Http\Livewire\Code\Table;

use Livewire\Component;
use App\Models\Table;

class Index extends Component
{
    public function render()
    {
        return view('livewire.code.table.index',[
            'tables' => Table::orderBy('id','desc')->paginate(4),
        ])
            ->extends('layouts.app', ['title' => 'tables']);
    }
}
