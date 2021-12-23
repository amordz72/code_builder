<?php

namespace App\Http\Livewire\Code;

use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests;
use Log;
use Storage;
use file;
class Make extends Component
{

    public $name;
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
    public function submit()
    {
        $this->validate();

  
    }

}
