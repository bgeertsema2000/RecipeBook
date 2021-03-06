<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

$recipe = Recipe::get();
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function get(){
        $recipes = Recipe::paginate(12);
        return view('home')->with('recipes', $recipes)
        ->with('i', (request()->input('page', 1) - 1)*10);
    }
    
    public function showRecipe(Recipe $recipe){
        $recipes = Recipe::all();
        // return view ('show_recipe')->with('recipes', $recipes);
        return view('show_recipe',compact('recipe'));
    }
}
