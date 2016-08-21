<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('reviews'))
        {
            Schema::drop('reviews');
        }

        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('work_id')->unsigned();;
            
            $table->string('reviewer');
            $table->text('content');
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
        Schema::drop('reviews');
    }
}
