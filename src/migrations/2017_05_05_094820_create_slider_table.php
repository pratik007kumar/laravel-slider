<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('slider', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');            
            $table->enum('slider_type', ['1', '2'])->comment('1=page banner,2=slider')->default('1');
            $table->string('short_code')->nullable();
            $table->string('settings');
            $table->boolean('status');
            $table->timestamps();
                       
        });
       Schema::create('slides', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('slider_id')->unsigned();
            $table->string('title');
            $table->string('image');
            $table->boolean('status');
            $table->timestamps();    
            $table->foreign('slider_id')->references('id')->on('slider');                   
        });
           

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('slides');
         Schema::drop('slider');
    }
}
