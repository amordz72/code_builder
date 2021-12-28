<?php

namespace App\Http\Livewire\Code\DataType;

use App\Models\DataType;
use Livewire\Component;

class Create extends Component
{
    public $row_index = 0;
    public $is_new = true;
    public $hidden_id = 0;

    public $name = '';
    public $types = '';

    protected $rules = [
        'name' => 'required|min:2',

    ];

    public function render()
    {

        $this->types = \App\Models\DataType::all();
        return view('livewire.code.data-type.create')->extends('layouts.app', ['title' => 'Create DataType']);
    }
    public function store()
    {
        $this->validate();
        DataType::create(
            ["name" => $this->name]

        );
    }
    public function edit($id)
    {
        $this->hiddenId = $id;
        $this->is_new = false;
        foreach ($this->types as $value) {

            if ($value->id == $id) {

                $this->name = $value->name;

            }

        }

    }
    public function update($id)
    {
        $this->validate();

        $this->hiddenId = $id;
        $p = \App\Models\DataType::find($this->hiddenId);

        $p->name = $this->name;

        $p->save();
        $this->clear();

    }

    public function destroy($id)
    {
        DataType::find($id)->delete();
    }
    public function clear()
    {
        $this->is_new = true;
        $this->name = "";
    }

}
