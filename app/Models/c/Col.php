<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Col extends Model
{
    protected $fillable = [
        'name',
        'type',
        'count',
        'sel',
        'if',
        'null',
        'index',
        'default',
        'hidden',
        'table_parent',
        'col_parent',
        'table_id',

    ];



    public function table()
    {
        return $this->hasOne(Project::class, 'id', 'table_id');
    }
}
