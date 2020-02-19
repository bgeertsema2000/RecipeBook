@extends('layouts.app')
 
@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="containe-fluid">
<table class="table table-bordered">
    <tr>
        <th>Number</th>
        <th>Name</th>
        <th>Calories</th>
        <th>Time To Prepare</th>
        <th>image</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($recipes as $recipe)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $recipe->name }}</td>
        <td>{{ $recipe->calories }} cal</td>
        <td>{{ $recipe->time_to_prepare }} min</td>
        {{-- <td><img src="storage/app/{{ $recipe->image }}" alt="" style="width:100px; height:40px"></td> --}}
    <td><img src="storage/{{$recipe->image}}" alt="" style="width:100px; height:40px"></td>
        <td>
            <form action="{{ route('recipes.destroy',$recipe->recipe_id) }}" method="POST">
                <a class="btn btn-primary" href="{{ route('recipes.edit',$recipe->recipe_id) }}">Edit</a>
                
                @csrf
                @method('DELETE')
                
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<a class="btn btn-success" href="{{ route('recipes.create') }}">Add New Recipe</a>

{!! $recipes->links() !!}
</div>
@endsection