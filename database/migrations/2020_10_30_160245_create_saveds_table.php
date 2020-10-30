<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saveds', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_saved')->nullable()->default(0);
            $table->timestamps();
        });

        if(!Schema::hasTable('recipe_saved')) {
        Schema::create('recipe_saved', function (Blueprint $table) {
            //foreign key recipe_id
            $table->unsignedBigInteger('recipe_id');
            //foreign key saved_id
            $table->unsignedBigInteger('saved_id');
            //primary key
            $table->primary(['recipe_id', 'saved_id']);
            //foreign keys
            $table->foreign('recipe_id')->references('id')->on('recipes')
            ->onDelete('cascade');

            $table->foreign('saved_id')->references('id')->on('saveds')
                ->onDelete('cascade');

            //timestamp
            $table->timestamps();

         });
        }
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_saved');
        Schema::dropIfExists('saveds');

    }
}
