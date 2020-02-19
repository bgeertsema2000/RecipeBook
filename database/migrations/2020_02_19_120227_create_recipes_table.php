<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function(Blueprint $table) {
		    $table->engine = 'InnoDB';
		
		    $table->integer('recipe_id');
		    $table->string('name', 255);
		    $table->text('description');
		    $table->string('image', 255)->default(null);
		    $table->integer('calories');
		    $table->integer('time_to_prepare');
		    $table->integer('for_people');
		    $table->integer('user_id')->default(null);
		
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
