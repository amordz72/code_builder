<?php

namespace App\Http\Livewire\Code\Strapi;

use App\Models\Project;
use App\Models\Strapi;
use App\Models\Tbl;
use App\Models\Col;
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

    public $tbls = array();
    public $tbl_id = 0;
    public $tbl_name = '';
    public $name = '';

    public function render()
    {
        $this->projs = Project::all();
        $this->tbls = Tbl::where('project_id', $this->proj_id)->get();
        $strapis = Strapi::paginate(5);
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
        $this->hidden_id = $id;
        $pr = Strapi::find($this->hidden_id);
        $this->name = $pr->name;

    }

    public function update()
    {
        $pr = Strapi::find($this->hidden_id);
        $this->clear();
    }

    public function destroy()
    {
        $pr = Strapi::find($this->hidden_id)->delete();
        $this->clear();
    }
    public function clear()
    {
        $this->new = true;
        $this->hidden_id = 0;
        $this->name = '';

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
    public function Store_cols()
    {

        Col::create([
            'name' => $this->tbl_name,
            'project_id' => $this->proj_id,

        ]);

        session()->flash('message', 'Table Created Successfully.');

        $this->tbl_name = '';

        $this->emit('Tbl_Store'); // Close model to using to jquery

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
