<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandAdjustmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_adjustments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('classification_id')->nullable();
            $table->string('expression');
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
        Schema::dropIfExists('land_adjustments');
    }
}
