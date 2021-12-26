<?php

namespace App\Http\Livewire\Code\Bank;

use Livewire\Component;
use App\Models\Bank;
class Index extends Component
{
    public $is_new = true;
    public $hidden_id = 0;
    public $banks = array();
    public $title = '';
    public $body = '';
    public $notes = '';
    public $lang_id = 0;

    protected $rules = [

        'title' => 'required|min:2|unique:banks,title',
        'body' => 'required|min:2',

    ];
    protected $messages = [
        'title.required' => 'This Row Is Required',

        'title.unique' => 'This Row Is Doplicated',
    ];

    public function render()
    {
          //Index Render method
          return view('livewire.code.bank.index', ['title' => 'All Bank'])
          ->extends('layouts.app');

    }

    public function store()
    {
        $this->validate();
        Bank::create([
            "title" => $this->title,
            "body" => $this->body,
            "notes" => $this->notes,
            "lang_id" => $this->lang_id,

        ]);
        $this->clear();
    }

    public function clear()
    {
        $this->new = true;
        $this->hidden_id = 0;
        $this->title = '';
        $this->body = '';
        $this->notes = '';
        $this->lang_id = 0;

    }


}
