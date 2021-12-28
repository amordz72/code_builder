<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table_child extends Model
{
    protected $fillable = [
        'name',
        'foreign_key',
        
        'table_id',

    ];

}
