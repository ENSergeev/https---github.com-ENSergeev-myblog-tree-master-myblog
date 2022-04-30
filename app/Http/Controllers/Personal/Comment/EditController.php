<?php

namespace App\Http\Controllers\Personal\Comment;


use App\Models\Comment;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke(Comment $comment){
        dd($comment);
        $comments = auth()->user()->comments;
        return view('personal.comment.edit',compact('comment'));
    }
}
