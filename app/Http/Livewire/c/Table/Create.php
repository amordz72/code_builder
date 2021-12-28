<?php

namespace App\Http\Livewire\Code\Table;

use App\Models\Project;
use App\Models\Table;
use Illuminate\Http\Request;
use Livewire\Component;

class Create extends Component
{

    public $all = array();
    public $projects = array();

    public $name = '';
    public $names = '';
    public $soft_delete = false;
    public $project_id = 0;
    public $model_name = '';

    public $index = 0;
    public $is_new = true;
    public $hiddenId = 0;

    public function render(Request $request)
    {
        /*  dd( $this->project_id);*/
        if (isset($request->id)) {
            $this->project_id = $request->id;
        }
        $this->projects = Project::all();

        if ($this->project_id != 0) {
            $this->all = Table::with('project')->with('cols')->where('project_id', $this->project_id)->orderBy('id', 'desc')->get();

        } else {
            $this->all = Table::with('project')->with('cols')->orderBy('id', 'desc')->get();

        }
        return view('livewire.code.table.create')

            ->extends('layouts.app', ['title' => 'Create Table']);
    }
    public function store()
    {
        Table::create([
            "name" => $this->name,
            "names" => $this->names,
            "model_name" => $this->model_name,
            "soft_delete" => $this->soft_delete,
            "project_id" => $this->project_id,

        ]);
        $this->clear();
    }
    public function update($id)
    {

        $this->hiddenId = $id;
        $p = Table::find($this->hiddenId);

        $p->name = $this->name;
        $p->names = $this->names;
        $p->model_name = $this->model_name;
        $p->soft_delete = $this->soft_delete;

        $p->save();
        $this->clear();
    }
    public function destroy($id)
    {
        $this->hiddenId = $id;
        Table::find($this->hiddenId)->delete();
        $this->clear();
        session()->flash('message', 'Order deleted successfully!');
    }
    public function clear()
    {
        $this->hiddenId = 0;
        $this->is_new = true;

        $this->name = '';
        $this->names = '';
        $this->soft_delete = false;

    }
    public function prev()
    {
        if ($this->index > 0) {
            $this->index = $this->index - 1;

        }
        $this->hiddenId = $this->all[$this->index]->id;
        $this->name = $this->all[$this->index]->name;
        $this->names = $this->all[$this->index]->names;

        $this->is_new = false;

    }
    public function next()
    {
        if ($this->index < count($this->all) - 1) {
            $this->index = $this->index + 1;

        }
        $this->hiddenId = $this->all[$this->index]->id;
        $this->name = $this->all[$this->index]->name;

        $this->is_new = false;
    }

    public function edit($id)
    {
        $this->hiddenId = $id;
        $this->is_new = false;
        foreach ($this->all as $value) {

            if ($value->id == $id) {

                $this->name = $value->name;
                $this->names = $value->names;
                $this->model_name = $value->model_name;
                $this->soft_delete = $value->soft_delete;
                $this->project_id = $value->project_id;
            }

        }
    }

    public function setNames()
    {
        $this->names = $this->name . 's';
        $this->model_name = ucfirst($this->name);
    }
}
