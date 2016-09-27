<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAllowNullToProjectsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $platform = Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform();
        $platform->registerDoctrineTypeMapping('enum', 'string');

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('video_chanel');
            $table->string('intro')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('video_url')->nullable()->change();
            $table->date('perform_date')->nullable()->change();
            $table->string('duration')->nullable()->change();
            $table->string('premiere')->nullable()->change();
            $table->string('feature_img')->nullable()->change();
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->string('video_chanel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('intro');
            $table->dropColumn('description');
            $table->dropColumn('video_url');
            $table->dropColumn('perform_date');
            $table->dropColumn('duration');
            $table->dropColumn('premiere');
            $table->dropColumn('feature_img');
        });
    }
}
