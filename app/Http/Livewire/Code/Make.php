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
        $route_name = '';
        if ($this->dir != '') {
            $dir = $this->dir . '/';
            $route_name = $this->dir . "." . $this->name . ".";
        } else {
            $route_name = $this->name . ".";

        }
        $this->validate();
        if ($this->step == 1) {

            $this->body = "php artisan make:livewire " . $dir . $this->name . "/index\n";
            $this->body .= "php artisan make:livewire " . $dir . $this->name . "/create\n";
            $this->body .= "php artisan make:livewire " . $dir . $this->name . "/edit\n";
            $this->body .= "php artisan make:livewire " . $dir . $this->name . "/show";

        } else if ($this->step == 2) {

            $this->body = "Route::get('/" . $dir . $this->name . "', App\Http\Livewire\\" . ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "\Index::class)->name('" . $route_name . "index');\n";
            $this->body .= "Route::get('/" . $dir . $this->name . "', App\Http\Livewire\\"
            . ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "\Create::class)->name('" . $route_name . "create');\n";
            $this->body .= "Route::get('/" . $dir . $this->name . "', App\Http\Livewire\\" .
            ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "\Edit::class)->name('" . $route_name . "edit');\n";
            $this->body .= "Route::get('/" . $dir . $this->name . "', App\Http\Livewire\\" .
            ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "\/Show::class)->name('" . $route_name . "show');\n";

        } else if ($this->step == 3) {

            $this->body =
            '

          //Index Render method
            return view(\'livewire.' . $route_name.'index' . '\', [\'title\' => \'All ' . ucfirst($this->name) . '\'])
           ->extends(\'layouts.app\');

           // Link
            <li class="nav-item">
             <a class="nav-link" href="{{ route(\'' . $route_name .'index' . '\') }}">{{ __(\'All ' . ucfirst($this->name) . '\') }}</a>
            </li>

          //Create Render method
            return view(\'livewire.' . $route_name.'create' . '\', [\'title\' => \'Create ' . ucfirst($this->name) . '\'])
           ->extends(\'layouts.app\');

           // Link
            <li class="nav-item">
             <a class="nav-link" href="{{ route(\'' . $route_name .'create' . '\') }}">{{ __(\'Create ' . ucfirst($this->name) . '\') }}</a>
            </li>

          //Edit Render method
            return view(\'livewire.' . $route_name.'edit' . '\', [\'title\' => \'Edit ' . ucfirst($this->name) . '\'])
           ->extends(\'layouts.app\');

           // Link
            <li class="nav-item">
             <a class="nav-link" href="{{ route(\'' . $route_name .'edit' . '\') }}">{{ __(\'Edit ' . ucfirst($this->name) . '\') }}</a>
            </li>

          //Show Render method
            return view(\'livewire.' . $route_name.'show' . '\', [\'title\' => \'Show ' . ucfirst($this->name) . '\'])
           ->extends(\'layouts.app\');

           // Link
            <li class="nav-item">
             <a class="nav-link" href="{{ route(\'' . $route_name .'show' . '\') }}">{{ __(\'Show ' . ucfirst($this->name) . '\') }}</a>
            </li>



            ';


        }

    }

}
