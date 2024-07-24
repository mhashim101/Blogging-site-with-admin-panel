<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function showComments(){
        $comments = Comment::with('post')->get();
        if($comments){
            return view('comments',compact('comments'));
        }else{
            return view('comments');
        }
    }
    public function pushComment(Request $request){
        $request->validate([
            'author' => 'required|string',
            'email' => 'required|email',
            'comment' => 'required|string',
            'post_id' => 'required|numeric',
        ]);
        $comments = Comment::create([
            'author' => $request->author,
            'email' => $request->email,
            'comment' => $request->comment,
            'post_id' => $request->post_id,
        ]);
        
        if($comments){
            return redirect()->route('blogposts',$request->post_id)->with('success','Your comment is successfully posted!');
        }
    }

    // Delete comments
    public function destroyComment($id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('comments')->with('success','Post Successfully Deleted!');
    }
}
