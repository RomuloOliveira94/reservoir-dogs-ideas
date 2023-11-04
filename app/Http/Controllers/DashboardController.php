<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        /*$idea = new Idea([
            "idea" => "doidera",
            "likes" => 34,
        ]);*/
        //$idea->idea = "test";
        //$idea->likes = 2;
        //$idea->save();
        $ideas= Idea::orderBy("created_at","desc");

        if(request()->has("search")){
            $term = request()->get("search", "");
            $ideas = $ideas->where("idea","like", "%". $term ."%");
        }

        return view("dashboard", [
            "ideas" =>  $ideas->paginate(5)
        ]);
    }
}
