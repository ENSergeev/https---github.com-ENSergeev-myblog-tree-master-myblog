<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Controllers\Controller;

class DeleteController extends BaseController
{

    public function __invoke(Post $post){
        // dd($post);
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}

