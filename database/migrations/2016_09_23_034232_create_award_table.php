<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('awards'))
        {
            Schema::drop('awards');
        }

        Schema::create('awards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('work_id')->unsigned();;
            
            $table->string('title');
            $table->string('description');
            $table->string('awardName');
            $table->timestamps();

            $table->foreign('work_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('awards');
    }
}
