<?php

namespace App\Http\Livewire\Code;

use Illuminate\Http\Request;
use Livewire\Component;

class Make extends Component
{

    public $step = 0;
    public $name;
    public $body = '';
    protected $rules = [

        'name' => 'required|min:6',
    ];
    protected $messages = [
        'name.required' => 'ادخل_الاسم_اولا',
    ];
    public function render(Request $request)
    {

        return view('livewire.code.make', ['title' => 'Make'])
            ->extends('layouts.app');

    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {

    }
    public function make_livewire_component()
    {
        $this->validate();
        if ($this->step == 1) {

            $this->body = "php artisan make:livewire " . $this->name;

        }

    }

}
