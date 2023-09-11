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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('name_en', 100)->nullable(); 
            $table->string('name_ar', 100);
            $table->longText('description_en')->nullable(); 
            $table->longText('description_ar');
            $table->string('image');
            $table->unsignedBigInteger('views')->nullable()->default(0);
            $table->integer('arrange')->nullable()->default(1);
            $table->integer('quantity')->nullable()->default(1);
            $table->decimal('price', 8, 2);
            $table->boolean('status')->default(true);
            $table->enum('file_type',["image","video"])->nullable()->default("image");
            // $table->decimal('discount', 8, 1)->nullable(); 
            // $table->decimal('shipping_fee', 8, 1)->nullable()->default(0); 
            // $table->timestamp('discount_start')->nullable(); 
            // $table->timestamp('discount_end')->nullable(); 
            // $table->text('offer')->nullable();
            // $table->string('sku')->nullable(); 
            //  $table->float('weight')->default(0);
            $table->timestamps();
            
            
           
            $table->unsignedBigInteger('user_id'); 
    
             // $table->unsignedBigInteger('sub_category_id'); // sub_category_id
            // $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade'); // sub_category id
            $table->unsignedBigInteger('category_id'); // sub_category_id
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // sub_category id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//user id
            
            // Indexes
            $table->index('name_en');
            $table->index('name_ar');
        });
        
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};