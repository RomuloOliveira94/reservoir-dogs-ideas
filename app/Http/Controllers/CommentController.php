<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Dotenv\Validator;
use Illuminate\Http\Request;

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
        ]);

        $comment->save();

        return redirect()->route('ideas.show', $idea->id)->with('success','Comment created successfully.');
    }
    public function destroy($comment){
        Comment::findOrFail($comment)->delete();
        return redirect()->route('dashboard')->with('success','Comment deleted successfully.');
    }

}
