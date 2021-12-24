<?php

namespace App\Http\Livewire\Code;

use Illuminate\Http\Request;
use Livewire\Component;

class Make extends Component
{

    public $step = 0;
    public $name = '';
    public $dir = '';
    public $body = '';
    protected $rules = [

        'name' => 'required|min:2',
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
        $dir = '';
        if ($this->dir != '') {
            $dir = $this->dir . '/';
        }
        $this->validate();
        if ($this->step == 1) {

            $this->body = "php artisan make:livewire " . $dir . $this->name . "/index\n";
            $this->body = "php artisan make:livewire " . $dir . $this->name . "/create\n";
            $this->body .= "php artisan make:livewire " . $dir . $this->name . "/edit\n";
            $this->body .= "php artisan make:livewire " . $dir . $this->name . "/show";

        } else if ($this->step == 2) {

            $this->body = "Route::get('/" . $dir . $this->name . "', App\Http\Livewire\\" . ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "/Index::class);\n";
            $this->body = "Route::get('/" . $dir . $this->name . "', App\Http\Livewire\\" . ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "/Create::class);\n";
            $this->body .= "Route::get('/" . $dir . $this->name . "', App\Http\Livewire\\" . ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "/Edit::class);\n";
            $this->body .= "Route::get('/" . $dir . $this->name . "', App\Http\Livewire\\" . ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "/Show::class);\n";

        }

    }

}
