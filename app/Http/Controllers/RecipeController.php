<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::paginate(10);
  
        return view('recipes.index',compact('recipes'))
            ->with('i', (request()->input('page', 1) - 1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image',
            'time_to_prepare',
            'calories',
            'for_people',
            'user_id'
            ]);
        $path = $request->file('image')->store('public');
        $request->image = $path;

        Recipe::create([
            'image' => $path,
            'name' => $request->name, 
            'description' => $request->description, 
            'time_to_prepare' => $request->time_to_prepare, 
            'calories' => $request->calories,
            'for_people' => $request->for_people,
            'user_id' => $request->user_id
        ]);
        
        return redirect()->route('recipes.index')
                        ->with('success','Recipe added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return view('recipes.show',compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        return view('recipes.edit',compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'name' => 'required',
            'description',
            'time_to_prepare',
            'for_people',
            'calories',
            'user_id'
        ]);
  
        $recipe->update($request->all());
  
        return redirect()->route('recipes.index')
                        ->with('success','Recipe updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
  
        return redirect()->route('recipes.index')
                        ->with('success','Recipe deleted successfully');
    }
    
    public function showrecipe(Recipe $recipe){
        return view('recipes.show_recipe', compact('recipe'));
    }
}
