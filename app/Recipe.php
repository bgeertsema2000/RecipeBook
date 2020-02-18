<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //volgende keer veld id noemen ipv tablename_id
    public $timestamps = false;// en waarom dit dit is facking handig van laravel
    //
    protected $primaryKey = 'recipe_id';// dit is dom je moet gwn id gebruiken
    protected $fillable = [
        'name',
        'description',
        'image',
        'time_to_prepare',
        'calories',
        'for_people',
        'user_id'
    ];
}
