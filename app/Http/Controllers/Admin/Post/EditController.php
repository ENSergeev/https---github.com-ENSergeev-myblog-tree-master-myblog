<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;

class EditController extends BaseController
{
    public function __invoke(Post $post){
        // dd($post);
        $categories = Category::all();
        $tags = Tag::all();
        // dd($post->tags);
        return view('admin.post.edit', compact('post','categories', 'tags'));
    }
}

