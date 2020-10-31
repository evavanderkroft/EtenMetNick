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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description');
            $table->text('description');
            $table->string('category')->default('none');
//            $table->unsignedInteger('user_id');
            $table->string('image')->default('hoi');
            $table->boolean('is_available')->nullable()->default(0);
            $table->boolean('is_saved')->nullable()->default(0);
            $table->timestamps();
        });

//        if(!Schema::hasTable('recipe_user')) {
//            Schema::create('recipe_user', function (Blueprint $table) {
//                //foreign key recipe_id
//                $table->unsignedBigInteger('recipe_id');
//                //foreign key user_id
//                $table->unsignedBigInteger('user_id');
//
//                //primary key
//                $table->primary(['recipe_id', 'user_id']);
//                //foreign keys
//                $table->foreign('recipe_id')->references('id')->on('recipes')
//                    ->onDelete('cascade');
//
//                $table->foreign('user_id')->references('id')->on('users')
//                    ->onDelete('cascade');
//
//                //timestamp
//                $table->timestamps();
//
//            });
//        };
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('recipe_user');
        Schema::dropIfExists('recipes');
    }
}
