<?php

namespace App\Http\Livewire\Code\Project;

use App\Models\Project;
use Livewire\Component;

class Create extends Component
{

    public $project=array();
       
    public $name = '';
    public $db = '';
    public $url = '';
    public function render()
    {
        $project=Project::paginate(5);
        //Create Render method
        return view('livewire.code.project.create', [
            'projects' => Project::paginate(5),
            ])
            ->extends('layouts.app');
    }

    public $is_new = true;
    public $hidden_id = 0;

    protected $rules = [

        'name' => 'required|min:2|unique:projects,name',
        'db' => 'required|min:2',

    ];
    protected $messages = [
        'name.required' => 'This Row Is Required',

        'name.unique' => 'This Row Is Doplicated',
    ];

    public function create()
    {

    }

    public function store()
    {
        $this->validate();
        Project::create([
            "name" => $this->name,
            "db" => $this->db,
            "url" => $this->url,

        ]);
        $this->clear();
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update($id)
    {
     $pr=   Project::find($id);
        $this->clear();
    }

    public function destroy($id)
    {
        $pr=   Project::find($id)->delete();
        $this->clear();
    }
    public function clear()
    {
        $this->new = true;
        $this->hidden_id = 0;
        $this->name = '';
        $this->db = '';
        $this->url = '';

    }
}
