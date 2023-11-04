<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $idea){
        return view("ideas.show", compact("idea"));
    }

    public function store(){
        $res_idea = request()->get('idea', '');

        request()->validate([
            'idea'=> 'required|min:5|max:240',
        ]);

        $idea = new Idea([
            "idea" => $res_idea,
        ]);

        $idea->save();

        return redirect()->route('dashboard')->with('success','Idea created successfully.');
    }

    public function edit(Idea $idea){
        $editing = true;
        return view('ideas.show', compact('idea','editing'));
    }
    public function update(Idea $idea){
        request()->validate([
            'idea'=> 'required|min:5|max:240',
        ]);
        $idea->update(request()->all());
        return redirect()->route('ideas.show', compact("idea"))->with("success","Idea updated successfully.");
    }

    public function destroy($idea){
        Idea::findOrFail($idea)->delete();
        return redirect()->route('dashboard')->with('success','Idea deleted with success.');
    }
}
