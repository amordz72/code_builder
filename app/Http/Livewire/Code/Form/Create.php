<?php

namespace App\Http\Livewire\Code\Form;

use App\Models\DataType;
use Livewire\Component;

class Create extends Component
{
/*

public $proj_id='';
public $proj_name='';
 */
    public $mode = 'add';
    public $cols = [];
    public $dataType = [];
    public $min_data_type = true;

    public $h_id = 0;
    public $col_id = 1;
    public $tbl_name = '';
    public $col_name = '';
    public $col_type = '';
    public $col_lenght = '255';
    public $col_def = '';
    public $col_def_enter = '';
    public $col_index = 'none';

    public function add()
    {
        $this->validate();
        if ($this->col_def != 'USER_DEFINED') {
            $this->col_def_enter = '';
        }
        if ($this->mode != 'add') {
            $ide = $this->h_id;
        } else {
            $ide = $this->col_id;
        }

        $this->cols[] = [

            "col_id" => $ide,
            "name" => $this->col_name,
            "type" => $this->col_type,
            "sel" => 1,
            "if" => 0,
            "lenght" => $this->col_lenght,

            "def" => $this->col_def,
            "def_enter" => $this->col_def_enter,
            "index" => $this->col_index,

        ];
        if ($this->mode == 'add') {
            $this->col_id++;
        }

        $this->clear();
        sort($this->cols);
        //ksort($this->cols);)(

        /*  $this->cols[] = ["name" => "rabeh", "type" => "id"];
    $j=json_encode( $this->cols[0]);
    $j2=json_decode( $j);
    dd( $j2->name); */

    }
    public function edit($id)
    {
        $this->h_id = $id;
        $this->mode = 'edit';
        foreach ($this->cols as $key => $value) {

            if ($this->cols[$key]["col_id"] == $id) {

                $this->col_name = $this->cols[$key]["name"];
                $this->col_type = $this->cols[$key]["type"];
                $this->col_lenght = $this->cols[$key]["lenght"];
                $this->col_type = $this->cols[$key]["type"];
                $this->col_def = $this->cols[$key]["def"];
                $this->col_def_enter = $this->cols[$key]["def_enter"];
                $this->col_index = $this->cols[$key]["index"];
                unset($this->cols[$key]);
            }
        }

    }
    public function del($id)
    {
        foreach ($this->cols as $key => $value) {

            if ($this->cols[$key]["col_id"] == $id) {

                unset($this->cols[$key]);
                $this->clear();}
        }}
    protected $rules = [
        'col_name' => 'required|min:2',
        'col_type' => 'required',
        // 'col_lenght' => 'required',

    ];
    public function update($id, $col_name, $value)
    {
        foreach ($this->cols as $key => $value) {

            if ($this->cols[$key]["col_id"] == $id) {

                $this->cols[$key][$col_name] = $value;

            }}
    }
    public function render()
    {

        if ($this->min_data_type) {
            $this->dataType = DataType::where('most', $this->min_data_type)->get();
        } else {
            $this->dataType = DataType::all();
        }

        //Create Render method
        return view('livewire.code.form.create', ['title' => 'Create Form'])
            ->extends('layouts.app');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function clear()
    {
        $this->col_name = "";
        $this->col_type = "";
        $this->col_lenght = "255";
        $this->col_type = "";
        $this->col_def = "";
        $this->col_def_enter = "";
        $this->col_index = "none";
        $this->mode = 'add';
    }

}
