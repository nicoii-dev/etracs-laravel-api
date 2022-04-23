<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLandValueAdjustment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faas', function (Blueprint $table) {
            $table->string('land_adjustment_type')->after('actual_use')->nullable();
            $table->string('adjustment_value')->after('land_adjustment_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faas', function (Blueprint $table) {
            $table->dropColumn('land_adjustment_type');
            $table->dropColumn('adjustment_value');
        });
    }
}
