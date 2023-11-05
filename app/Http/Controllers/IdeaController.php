<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{

    public function show(Idea $idea){
        return view("ideas.show", compact("idea"));
    }

    public function store(){

        $validated = request()->validate([
            'idea'=> 'required|min:5|max:240',
        ]);

        $validated['user_id'] = auth()->user()->id;

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success','Idea created successfully.');
    }

    public function edit(Idea $idea){
        if(auth()->user()->id != $idea->user_id){
            abort(404);
        }

        $editing = true;
        return view('ideas.show', compact('idea','editing'));
    }
    public function update(Idea $idea){

        if(auth()->user()->id != $idea->user_id){
            abort(404);
        }

        $validated = request()->validate([
            'idea'=> 'required|min:5|max:240',
        ]);
        $idea->update($validated);
        return redirect()->route('ideas.show', compact("idea"))->with("success","Idea updated successfully.");
    }

    public function destroy(Idea $idea){

        if(auth()->user()->id != $idea->user_id){
            abort(404);
        }

        $idea->delete();
        return redirect()->route('dashboard')->with('success','Idea deleted with success.');
    }
}
