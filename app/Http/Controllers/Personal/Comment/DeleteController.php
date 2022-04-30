<?php

namespace App\Http\Controllers\Personal\Comment;


use App\Models\Comment;
use App\Http\Controllers\Controller;

class DeleteController extends Controller
{
    public function __invoke(Comment $comment){
        dump(auth()->user()->id);

        // dd($comment);
        // dd($comments);
        $comment -> delete();
        // dd($comment);
        return redirect()->route('personal.comment.index');
    }
}
