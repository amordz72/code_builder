<?php

namespace App\Http\Livewire\Code\Make;

use App\Models\Col;
use App\Models\Controle;
use App\Models\Project;
use App\Models\Table;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Create extends Component
{

    public $proj_id = 0;

    public $code_mode = true;
    public $table_id = 0;
    public $col_type = '';
    public $col_count = 0;
    public $table = '';
    public $table_name = '';
    public $multi_name = '';
    public $model_name = '';
    public $cols_model_name = '';

    public $projs = array();
    public $tables = array();
    public $cols = array();
    public $controles = array();

    public $proj_name = '';
    public $code = '';
    public $f_name = '';
    public $f_ext = '.txt';

    public function render()
    {

        $this->projs = Project::all();
        $this->controles = Controle::all();

        $this->setTables();
        // $this->save();

        return view('livewire.code.make.create', [
            'projs' => Project::orderBy('id', 'desc')->paginate(4),
        ])
            ->extends('layouts.app', ['title' => 'Code Create']);
    }

    public function setTables()
    {

        $this->tables = Table::where('project_id', $this->proj_id)->get();
        $this->cols = Col::where('table_id', $this->table_id)->get();

    }
    public function setCols($id, $tbl, $multi, $model)
    {
        $this->table_id = $id;
        $this->table_name = $tbl;
        $this->multi_name = $multi;
        $this->model_name = $model;
    }
    public function save()
    {
        $path = Storage::disk('public')->path($this->proj_name);
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $myfile = fopen($path . $this->f_name . $this->f_ext, "w") or die("Unable to open file!");

        fwrite($myfile, $this->code);
        fclose($myfile);
    }

    public function temp($id, $var)
    {
        foreach ($this->cols as $key => $value) {
            if ($value->id == $id) {
                dd($id . " - " . $var . "//" . $value->id);

            }
        }

    }
    public function update_sel($id, $sel)
    {
        $c = Col::Find($id);
        $c->sel = $sel;

        $c->save();

    }
    public function update_if($id, $if)
    {
        $c = Col::Find($id);

        $c->if = $if;
        $c->save();

    }
    public function update_hidden($id, $if)
    {
        $c = Col::Find($id);

        $c->hidden = $if;
        $c->save();

    }
    public function update_null($id, $if)
    {
        $c = Col::Find($id);

        $c->null = $if;
        $c->save();

    }
    public function update_count($id)
    {
        $c = Col::Find($id);

        $c->count = $this->col_count;
        $c->save();

    }
    public function delete_col($id)
    {
        $c = Col::Find($id)->delete();

    }
    public function model_code()
    {
        $this->set_cols_model_name();
        /*
        if ($this->db_name == '') {
        $this->db_name = str_replace('-', '_', $this->name);
        }
        $this->url = 'http://localhost/laravel/' . $this->name . '/public';

         */

        $this->body =
            <<<EOT
            <?php

             namespace App\Models;

                    use Illuminate\Database\Eloquent\Factories\HasFactory;
                    use Illuminate\Database\Eloquent\Model;

                    class    $this->model_name  extends Model
                    {

            EOT;
        $this->body .=
            <<<EOT
                  \n
              EOT;
        $this->body .=
            <<<EOT
            protected \$table='$this->table_name';
            protected \$fillable = [
                $this->cols_model_name
               ];


          /*  public function cols()
            {
                return \$this->hasMany(Col::class, 'table_id', 'id');
            }


            public function project()
            {
                return \$this->hasOne(Project::class, 'id', 'project_id');
            }

           

            */

        }


        EOT;

    }

    public function str($var = null)
    {
        return <<<EOT

    $var

EOT;
    }

    public function set_cols_model_name()
    {
        foreach ($this->cols as $key => $value) {
            $this->cols_model_name .= $value->name . ','."\n";
        }
    }

}
