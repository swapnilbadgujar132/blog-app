<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $primaryKey = 'post_id';

    protected $casts = [
        'published_at' => 'date',
    ];
    
    protected $fillable = ['title','content','author_name','published_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

}
