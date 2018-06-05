<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('capo')->nullable();
            $table->string('image');
            $table->longText('description')->nullable();
            $table->string('related_news')->nullable();
            $table->string('sibling_news')->nullable();
            $table->string('public_time')->nullable();
            $table->string('source')->nullable();
            $table->string('nickname')->nullable();
            $table->integer('price')->nullable();
            $table->integer('views')->nullable()->default(0);
            $table->integer('hot')->nullable()->default(1);
            $table->string('seo_title')->nullable();
            $table->string('seo_keyword')->nullable();
            $table->string('seo_description')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->softDeletes()->nullable()->default(null);
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
        Schema::dropIfExists('news');
    }
}
