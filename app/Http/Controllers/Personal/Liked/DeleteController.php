<?php

namespace App\Http\Controllers\Personal\Liked;


use App\Models\Post;
use App\Models\User;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke(Post $post){
        // dump(auth()->user());
        // dump(auth()->user()->id);
        // dump($post);
        // dump(auth()->user()->likedPosts());
        auth()->user()->likedPosts()->detach($post->id);
        return redirect()->route('personal.liked.index');
    }
}
