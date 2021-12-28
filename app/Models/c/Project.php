<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
     'name',
      'db_name',
      'db_type',
      'path',
      'url',
       'env',

    ];


    public function tables()
    {
        return $this->hasMany(Table::class, 'project_id', 'id');
    }
}
