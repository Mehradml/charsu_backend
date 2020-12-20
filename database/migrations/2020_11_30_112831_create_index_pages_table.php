<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndexPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('index_pages', function (Blueprint $table) {
            $table->id();
            $table->string('header_title1');
            $table->string("header_title2");
            $table->string('header_text');
            $table->string('projects_title1');
            $table->string("projects_title2");
            $table->string('projects_text');
            $table->string('courses_title1');
            $table->string("courses_title2"); 
            $table->string('products_title1');
            $table->string("products_title2");
            $table->string("news_title");   
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
        Schema::dropIfExists('index_pages');
    }
}
