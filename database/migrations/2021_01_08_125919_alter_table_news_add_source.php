<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Database\Seeders\NewsSourceIdSeeder;

class AlterTableNewsAddSource extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table){
            $table->unsignedBigInteger('source_id')
                ->after('category_id')
                ->nullable();
            $table->foreign('source_id')->references('id')->on('sources');
        });
//        (new NewsSourceIdSeeder())->run(); - плохая практика.

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table){
            $table->dropForeign(['source_id']);
            $table->dropColumn(['source_id']);
        });
    }
}
