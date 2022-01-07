<?php

namespace App\Http\Livewire\Code\Strapi;

use App\Models\Col;
use App\Models\DataType;
use App\Models\Project;
use App\Models\Strapi;
use App\Models\Tbl;
use Livewire\Component;

class Create extends Component
{
    public $updateMode = false;

    public $is_new = true;
    public $hidden_id = 0;
    public $strapi = array();
    public $projs = array();
    public $proj_id = 0;
    public $proj_name = "";
    public $db = "";
    public $url = "";
//table
    public $tbls = array();
    public $tbl_id = 0;
    public $tbl_name = '';
    public $tbl_names = '';
    public $model_name = '';
    public function ch_name()
    {
        $t = '';
        if ($this->tbl_name == 'category') {
            $t = 'categories';
        } else {
            $t = $this->tbl_name;
        }

        $this->tbl_names = $t;
        $this->model_name = ucfirst($this->tbl_name);
    }

    //columns
    public $cols = array();
    public $col_hiddenId = 0;
    public $c_name = '';
    public $c_type = '';
    public $c_sel = true;
    public $c_if = false;
    public $c_lenght = '';
    public $c_index = '';
    public $c_default = '';
    public $c_parent = '';
    public $c_hidden = false;

    public $rel_type = '';

    //dataType
    public $mostOnly = true;
    public $dataType = array();

    public function render()
    {
        $this->projs = Project::all();

        $this->tbls = Tbl::where('project_id', $this->proj_id)->get();
        $this->cols = Col::where('tbl_id', $this->tbl_id)->get();
        $strapis = Strapi::paginate(5);

        if ($this->mostOnly) {
            $this->dataType = DataType::where("most", "1")->get();
        } else {
            $this->dataType = DataType::orderBy('id', 'asc')->get();
        }

        return view('livewire.code.strapi.create', ['title' => 'Strapi Form'])
            ->extends('layouts.app');
    }

    protected $rules = [

        'name' => 'required|min:2|unique:strapis,name',

    ];
    protected $messages = [

        'name.required' => 'This Row Is Required',

    ];

    public function create()
    {

    }

    public function store()
    {
        $this->validate();

        Strapi::create([
            "name" => $this->name,

        ]);
        $this->clear();
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $this->col_hiddenId = $id;
        $this->is_new = false;

        $pr = Col::find($id);

        $this->c_name = $pr->name;
        $this->c_type = $pr->type;
        $this->c_sel = $pr->sel;
        $this->c_if = $pr->if;
        $this->c_lenght = $pr->lenght;
        $this->c_default = $pr->default;
        $this->c_hidden = $pr->hidden;
        $this->c_parent = $pr->parent;
        $this->rel_type = $pr->rel_type;

    }

    public function update()
    {
        $pr = Strapi::find($this->hidden_id);
        $this->clear();
    }
    public function update_col()
    {
        $pr = Col::find($this->col_hiddenId);

           $p->name = $this->c_name;
             $p->type = $this->c_type;
             $p->sel = $this->c_sel;
             $p->if = $this->c_if;
             $p->lenght = $this->c_lenght;
             $p->index = $this->c_index;
             $p->parent = $this->c_parent;
             $p->default = $this->c_default;
             $p->rel_type = $this->rel_type;
             $p->tbl_id = $this->tbl_id;



        $this->clear(); //
    }

    public function destroy()
    {
// $pr = Strapi::find($this->hidden_id)->delete();
        // $this->clear();
    }
    public function destroy_col()
    {

        $pr = Col::find($this->hidden_id)->delete();
    }
    public function clear()
    {
        $this->new = true;
        $this->hidden_id = 0;

    }

    //Project
    private function resetInputFields_Project()
    {
        $this->proj_name = '';

    }

    public function store_project()
    {

        Project::create([
            'name' => $this->proj_name,
            'db' => $this->db,
            'url' => $this->url,
        ]);

        session()->flash('message', 'Project Created Successfully.');

        $this->resetInputFields_Project();

        $this->emit('Project_Store'); // Close model to using to jquery

    }
    public function store_col()
    {

        Col::create([
            'name' => $this->c_name,
            'type' => $this->c_type,
            'sel' => $this->c_sel,
            'if' => $this->c_if,
            'lenght' => $this->c_lenght,
            'index' => $this->c_index,
            'default' => $this->c_default,
            'hidden' => $this->c_hidden,
            'parent' => $this->c_parent,
            'rel_type' => $this->rel_type,
            'tbl_id' => $this->tbl_id,

        ]);

        session()->flash('message', 'Col Created Successfully.');

        $this->c_name = '';

        $this->emit('Col_Store'); // Close model to using to jquery

    }
    public function Store_Tbl()
    {

        Tbl::create([
            'name' => $this->tbl_name,
            'project_id' => $this->proj_id,

        ]);

        session()->flash('message', 'Table Created Successfully.');

        $this->tbl_name = '';

        $this->emit('Tbl_Store'); // Close model to using to jquery

    }

}
