<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name_en', 100);
            $table->string('name_ar', 100)->nullable(); 
            $table->integer('arrange')->default(1);
            $table->string('image');
            $table->decimal('price', 8, 2);
            $table->decimal('price_for_one', 8, 2);
            $table->decimal('price_for_two', 8, 2);
              $table->decimal('price_for_three', 8, 2);
            $table->boolean('status')->default(true);
            $table->string('adress', 100);
  
            $table->longText('description_en')->nullable(); 
            $table->longText('description_ar');
            $table->timestamp('start_data')->nullable(); 
            $table->timestamp('end_data')->nullable(); 
            $table->unsignedBigInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('activities_catogeries_id');
            $table->foreign('activities_catogeries_id')->references('id')->on('activities_catogeries')->onDelete('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
};