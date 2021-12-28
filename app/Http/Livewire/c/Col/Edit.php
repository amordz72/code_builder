<?php

namespace App\Http\Livewire\Code\Col;

use App\Models\Col;
use App\Models\DataType;
use Illuminate\Http\Request;
use Livewire\Component;

class Edit extends Component
{
    public $tables = array();
    public $types = array();
    public $cols = array();

    public $col_get = 0;
    public $col_id = 0;

    public $index = 0;
    public $is_new = false;

    public $hiddenId = 0;
    public $col_name = '';
    public $col_type = '';
    public $col_count = '255';

    public $col_index = false;
    public $is_null = false;
    public $is_hidden = false;
    public $is_sel = true;
    public $is_if = false;
    public $col_default = '';
    public $col_table_parent = '';
    public $col_col_parent = '';
    protected $rules = [
        'col_name' => 'required|min:2',
        'col_type' => 'required|min:2',

    ];
    public function render(Request $request)
    {
        $this->cols = Col::all();

        $this->types = DataType::all();

        if (isset($request->id)) {
            $this->col_id = $request->id;
        }

        $this->set();

        // dd( $this->col_get->name);
        return view('livewire.code.col.edit')

            ->extends('layouts.app', ['title' => 'Edit Col']);
    }

    public function set()
    {
        $this->col_get = Col::Find($this->col_id);
        $this->col_name = $this->col_get->name;
        $this->is_sel = $this->col_get->sel;
        $this->is_if = $this->col_get->if;
        $this->is_null = $this->col_get->null;
        $this->is_hidden = $this->col_get->hidden;
        $this->col_count = $this->col_get->count;
        $this->col_type = $this->col_get->type;
        $this->col_index = $this->col_get->index;
        $this->col_table_parent = $this->col_get->table_parent;
        $this->col_col_parent = $this->col_get->col_parent;
        $this->col_default = $this->col_get->default;

    }public function update()
    {
        $this->validate();
        $pes = Col::Find($this->col_id);

        $pes->name = $this->col_name;
        $pes->sel = $this->is_sel;
        $pes->if = $this->is_if;
        $pes->type = $this->col_type;
        $pes->count = $this->col_count;
        $pes->null = $this->is_null;

        $pes->index = $this->col_index;
        $pes->default = $this->col_default;
        $pes->hidden = $this->is_hidden;
        $pes->table_parent = $this->col_table_parent;

        $pes->col_parent = $this->col_col_parent;

        // $pes->table_id = $this->table_id; $this->clear();   $this->clear();

        $pes->save();

    }
    public function destroy($id)
    {
        $pes = Col::find($id)->delete();

    }
    public function clear()
    {
        $this->col_id = 0;
        $this->col_name = '';
        $this->col_type = '';
        $this->col_count = '255';
        $this->col_length = '';
        $this->col_index = false;
        $this->is_null = false;
        $this->is_hidden = false;
        $this->is_sel = true;
        $this->col_default = '';
        $this->is_if = false;

        $this->col_table_parent = '';
        $this->col_col_parent = '';

        $this->is_new = false;
    }
}
