<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'id',
        'title',
        'slug',
        'body',
        'image',
        'category_id',
        'user_id',

    ];

    public function categories()
    {

        return $this->belongsToMany(Category::class, 'id', 'category_id');

    }

    public function user()
    {

        return $this->hasOne(User::class, 'id', 'user_id');

    }

}
