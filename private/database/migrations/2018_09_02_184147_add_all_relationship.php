<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAllRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topics', function (Blueprint $table) {
            $table
                ->integer('category_id')
                ->unsigned()
                ->default(null)
                ->nullable()
                ->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table
                ->integer('group_id')
                ->unsigned()
                ->default(null)
                ->nullable()
                ->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('cascade');
        });
        Schema::table('news', function (Blueprint $table) {
            $table
                ->integer('type_id')
                ->unsigned()
                ->default(null)
                ->nullable()
                ->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onDelete('cascade');
        });
        Schema::table('news', function (Blueprint $table) {
            $table
                ->integer('user_id')
                ->unsigned()
                ->default(null)
                ->nullable()
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
        Schema::table('news', function (Blueprint $table) {
            $table
                ->integer('topic_id')
                ->unsigned()
                ->default(null)
                ->nullable()
                ->foreign('topic_id')
                ->references('id')
                ->on('topics')
                ->onDelete('cascade');
        });
        Schema::table('map_news_tag', function (Blueprint $table) {
            $table
                ->integer('news_id')
                ->unsigned()
                ->default(null)
                ->nullable()
                ->foreign('news_id')
                ->references('id')
                ->on('news')
                ->onDelete('cascade');
        });
        Schema::table('map_news_tag', function (Blueprint $table) {
            $table
                ->integer('tag_id')
                ->unsigned()
                ->default(null)
                ->nullable()
                ->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('group_id');
        });
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('type_id');
        });
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn('topic_id');
        });
        Schema::table('map_news_tag', function (Blueprint $table) {
            $table->dropColumn('news_id');
        });
        Schema::table('map_news_tag', function (Blueprint $table) {
            $table->dropColumn('tag_id');
        });
    }
}
