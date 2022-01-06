<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'project_id',
        
    ];


    public function project(): HasOne
    {
        return $this->hasOne(Project::class,'project_id', 'id');
    }
    public function cols(): HasMany
    {
        return $this->hasMany(Tbl::class, 'tbl_id', 'id');
    }
}
