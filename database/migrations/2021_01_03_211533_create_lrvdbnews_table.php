<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\CategorySeeder;
use Database\Seeders\NewsSeeder;

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
            $table->string('categories', 50)
                ->unique();
            $table->timestamps();
            $table->softDeletes();
        });
        (new CategorySeeder())->run();

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

//        (new NewsSeeder())->run(); - плохая практика.

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
