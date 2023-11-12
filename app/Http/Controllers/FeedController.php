<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {

        //getting the ids of the user that actual logged follows
        $followingsIDs = auth()->user()->followings()->pluck('user_id');

        $ideas= Idea::whereIn('user_id', $followingsIDs)->latest();

        if(request()->has("search")){
            $term = request()->get("search", "");
            $ideas = $ideas->where("idea","like", "%". $term ."%");
        }

        return view("dashboard", [
            "ideas" =>  $ideas->paginate(5)
        ]);
    }
}
