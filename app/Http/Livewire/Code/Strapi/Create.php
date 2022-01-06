<?php

namespace App\Http\Livewire\Code\Strapi;

use App\Models\Project;
use App\Models\Strapi;
use App\Models\Tbl;
use Livewire\Component;

class Create extends Component
{

    public $is_new = true;
    public $hidden_id = 0;
    public $strapi = array();
    public $projs = array();
    public $proj_id = 0;
    public $proj_name = "";

    public $tbls = array();
    public $tbl_id = 0;
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
}
