<?php

namespace App\Models;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'posts';
    protected $fillable = ['title','content','preview_image','main_image','category_id'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id','tag_id');
    }
}
