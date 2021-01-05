<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLrvdbnewsTable extends Migration
{
    /**
     * Run the migrations.

     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('categories')
                ->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('tittle', 50)
                ->unique();
            $table->text('content');
            $table->unsignedBigInteger('category_id')
                ->index()
                ->nullable(false);
            $table->boolean('active')
                ->default(false);
            $table->dateTime('publish_date')
                ->index();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('category_id')->references('id')->on('categories');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news');
        Schema::drop('categories');
    }
}
