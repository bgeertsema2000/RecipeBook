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
        $recipes = Recipe::all();
        return view('home')->with('recipes', $recipes);}
}
