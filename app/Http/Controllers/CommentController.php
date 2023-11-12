<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Idea;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, Idea $idea){

        $validated = $request->validated();

        $validated['user_id'] = auth()->id();
        $validated['idea_id'] = $idea->id;

        Comment::create($validated);

        return redirect()->route('ideas.show', $idea->id)->with('success','Comment created successfully.');
    }
    public function destroy(Idea $idea, Comment $comment){

        $this->authorize('delete', $comment);

        $comment->delete();
        return redirect()->route('ideas.show', $idea->id)->with('success','Comment deleted successfully.');
    }

}
