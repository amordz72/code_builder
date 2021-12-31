<?php

namespace App\Http\Livewire\Code\Form;

use App\Models\DataType;
use Livewire\Component;
use Storage;

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
    public $proj_name = '';
    public $tbl_name = '';
    public $tbl_p_name = '';
    public $code_save = '';

    public $dir = '';
    public $body = '';

    public $h_id = 0;
    public $col_id = 1;

    public $col_name = '';
    public $col_sel = true;
    public $col_if = false;
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
            "sel" => $this->col_sel,
            "if" => $this->col_if,
            "sel" => $this->col_sel,

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
                $this->col_if = $this->cols[$key]["if"];
                $this->col_def = $this->cols[$key]["def"];
                $this->col_lenght = $this->cols[$key]["lenght"];
                $this->col_type = $this->cols[$key]["type"];
                $this->col_sel = $this->cols[$key]["sel"];

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
    public function save_cols()
    {
        if ($this->proj_name === '') {
            session()->flash('proj_name_e', 'proj_name empty');
            return;
        }
        if ($this->tbl_name === '') {
            session()->flash('tbl_name', 'tbl_name empty');
            return;
        }
        //Storage::put($this->name . "//" . $this->step . "_" . $this->step_text . '.txt', $this->body);

        $str = $this->proj_name.'//'. $this->tbl_name.'//cols';
        Storage::put($str . '.json', json_encode( $this->cols));

    }
    public function restore_cols()
    {
        if ($this->proj_name === '') {
            session()->flash('proj_name_e', 'proj_name empty');
            return;
        }
        if ($this->tbl_name === '') {
            session()->flash('tbl_name', 'tbl_name empty');
            return;
        }
        $this->cols= array();
        //Storage::put($this->name . "//" . $this->step . "_" . $this->step_text . '.txt', $this->body);

        $str = $this->proj_name.'//'. $this->tbl_name.'//cols.json';
       // Storage::put($str . '.json', json_encode( $this->cols));
   $s=  Storage::disk('local')->get($str);
   $this->cols=   json_decode($s, true);
    }

    //تحويل_من كود_الى_نص
    public function get_str($str = '')
    {
        if ($str == '') {
            $str = $this->body;
        }

        $this->body = str_replace("\$", "\\$", $str);

        $this->body = str_replace('"', '\\"', $this->body);
        $this->body = str_replace("\n", "\\n", $this->body);
        //   $this->body = str_replace("\\", "\\\\", $this->body);
        $this->body = "\$this->body= \"" . $this->body . "\";";

        //   $this->body = "  if (\$str == '') {\n \$str  =\$this->body ;\n\n        }";
    }
    public function t()
    {

    }
    public function form_c()
    {
        if ($this->tbl_name === '') {
            session()->flash('tbl_name', 'tbl_name empty');
            return;
        }
        $this->code_save='form_create';

    }

}
