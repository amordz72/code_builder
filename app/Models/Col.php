<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Col extends Model
{
    use HasFactory;






    public function tbl(): HasOne
    {
        return $this->hasOne(Tbl::class,'tbl_id', 'id');
    }
}
