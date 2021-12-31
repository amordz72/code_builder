<?php

namespace App\Http\Livewire\Code\Form;

use Livewire\Component;

class Create extends Component
{
/*
public $mode='';
public $proj_id='';
public $proj_name='';
 */

    public $cols = [
        [
            "name" => "amor",
            "type" => "id",

        ],
        ["name" => "rabeh"
            ,
            "type" => "id"],
    ];
    public $tbl_name = '';
    public $col_name = '';
    public $col_type = '';
    public $col_lenght = '255';
    public $col_def = '';
    public $col_def_enter = '';
    public $col_index = '';
    public function render()
    {
        //Create Render method
        return view('livewire.code.form.create', ['title' => 'Create Form'])
            ->extends('layouts.app');
    }
    public function add()
    {
        $this->cols[] = ["name" => "rabeh", "type" => "id"];

        // dd($this->cols[0]);

    }
}
