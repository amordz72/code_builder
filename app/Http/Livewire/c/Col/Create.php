<?php

namespace App\Http\Livewire\Code\Col;

use App\Models\Col;
use Illuminate\Http\Request;
use Livewire\Component;

class Create extends Component
{
    // public $all_data = array();

    public $row_index = 0;
    public $is_new = true;
    public $hidden_id = 0;

    public $types = array();
    public $tables = array();
    public $cols = array();
    public $table_id = 0;

    public $table_name = '';

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
        if (isset($request->id)) {
            $this->table_id = $request->id;
        }
        $this->tables = \App\Models\Table::all();
        $this->types = \App\Models\DataType::all();
        $this->cols = Col::with('table')->orderBy('id', 'desc')->get();

        return view('livewire.code.col.create')
            ->extends('layouts.app', ['title' => 'Create Columns']);
    }
    public function store()
    {
        $this->validate();
        Col::create([
            "name" => $this->col_name,
            "type" => $this->col_type,
            "sel" => $this->is_sel,
            "if" => $this->is_if,
            "count" => $this->col_count,
            "null" => $this->is_null,
            "index" => $this->col_index,
            "default" => $this->col_default,
            "hidden" => $this->is_hidden,
            "table_parent" => $this->col_table_parent,
            "col_parent" => $this->col_col_parent,

            "table_id" => $this->table_id,
        ]);

        $this->clear();
    }
    public function update()
    {
        $this->validate();
        $pes = Col::find($this->hiddenId);

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

        $pes->table_id = $this->table_id;

        $pes->save();
        $this->clear();
    }
    public function destroy($id)
    {
        $pes =Col::find($id)->delete();
        $this->clear();
    }
    public function set_count()
    {
        if ($this->col_type == 'string') {
            $this->col_count = '255';
        } else if ($this->col_type == 'decimal') {
            $this->col_count = '13, 2';
        } else if ($this->col_type == 'float') {
            $this->col_count = '13, 2';
        } else {
            $this->col_count = '';
        }

    }

    public function edit($item)
    {

        $this->hiddenId = $item['id'];

        $this->col_name = $item['name'];
        $this->col_type = $item['type'];
        $this->col_count = $item['count'];

        $this->col_index = $item['index'];
        $this->is_null = $item['null'];
        $this->is_hidden = $item['hidden'];
        $this->is_sel = $item['sel'];
        $this->is_if = $item['if'];
        $this->col_default = $item['default'];
        $this->col_table_parent = $item['table_parent'];
        $this->col_col_parent = $item['col_parent'];
        $this->table_id = $item['table_id'];
        $this->is_new = false;

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

        $this->is_new = true;
    }

}
