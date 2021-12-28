<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{

    protected $table='tables';
    protected $fillable = [
        'name',
        'names',
        'model_name',
         'soft_delete',
         'project_id',


       ];


    public function cols()
    {
        return $this->hasMany(Col::class, 'table_id', 'id');
    }


    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    public function childs()
    {
        return $this->hasMany(Table_child::class, 'table_id', 'id');
    }



}
