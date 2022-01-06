<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Col extends Model
{
    use HasFactory;

    protected $table = 'cols';
    protected $fillable = [

        'id',
        'name',
        'type',
        'length',
        'sel',
        'if',
        'index',
        'default',
        'hidden',
        'parent',
        'rel_type',

    ];

    public function tbl(): HasOne
    {
        return $this->hasOne(Tbl::class, 'tbl_id', 'id');
    }
}
