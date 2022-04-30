<?php

namespace App\Http\Controllers\Personal\Liked;


use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke(Post $post){
        dd(auth()->user()->id);
        auth()->user()->likedPosts()->detach($post->id);
        // dd($posts);
        return redirect()->route('personal.liked.index');
    }
}
