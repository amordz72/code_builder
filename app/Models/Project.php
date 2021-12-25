<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;






    /**
     * Get all of the comments for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tbls(): HasMany
    {
        return $this->hasMany(Tbl::class, 'project_id', 'id');
    }
}
