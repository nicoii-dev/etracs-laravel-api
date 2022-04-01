<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_levels', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('fix')->nullable();
            $table->string('rate');
            $table->string('class');
            $table->string('lgu_tag')->nullable();
            $table->string('year_tag');
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
        Schema::dropIfExists('assessment_levels');
    }
}
