<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $primaryKey = 'comment_id';
    protected $fillable=['comment_id','post_id','content','commenter_name'];
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
