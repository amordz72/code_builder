<?php

namespace App\Http\Livewire\Test\Category;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{

    public $is_new = true;
    public $hidden_id = 0;
    public $category = array();

    public $name = '';

    public function render()
    {

        $categorys = Category::paginate(5);
        //Create Render method
        return view('livewire.test.category.create', ['title' => 'Create Category'])
            ->extends('layouts.app');
    }

    protected $rules = [

        'name' => 'required|min:2|unique:categorys,name',

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

        Category::create([
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
        $pr = Category::find($this->hidden_id);
        $this->name = $pr->name;

    }

    public function update()
    {
        $pr = Category::find($this->hidden_id);
        $this->clear();
    }

    public function destroy()
    {
        $pr = Category::find($this->hidden_id)->delete();
        $this->clear();
    }
    public function clear()
    {
        $this->new = true;
        $this->hidden_id = 0;
        $this->name = '';

    }
}
