<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //volgende keer veld id noemen ipv tablename_id
    public $timestamps = false;
    //
    protected $primaryKey = 'recipe_id';
    protected $fillable = [
        'name',
        'description',
        'image',
        'time_to_prepare',
        'calories'
    ];
}
