<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function showComments(){
        $comments = Comment::all();
        if($comments){
            return view('comments',compact('comments'));
        }else{
            return view('comments');
        }
    }
}
