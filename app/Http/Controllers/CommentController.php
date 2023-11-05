<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Idea $idea){
        $res_comment = request()->get("comment", []);


        request()->validate([
            "comment.$idea->id" => ['required','string','max:240'],
        ]);

        $comment = new Comment([
            'idea_id'=> $idea->id,
            'content'=> $res_comment[$idea->id],
            'user_id'=> auth()->user()->id,
        ]);

        $comment->save();

        return redirect()->route('ideas.show', $idea->id)->with('success','Comment created successfully.');
    }
    public function destroy(Idea $idea, Comment $comment){

        if(auth()->user()->id != $comment->user_id){
            abort(404);
        }

        $comment->delete();
        return redirect()->route('ideas.show', $idea->id)->with('success','Comment deleted successfully.');
    }

}
