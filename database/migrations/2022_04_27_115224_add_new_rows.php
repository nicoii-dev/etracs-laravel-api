<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewRows extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faas', function (Blueprint $table) {
            $table->string('barangay_lgu')->after('beneficial_address')->nullable();
            $table->string('city_municipality')->after('barangay_lgu')->nullable();
            $table->string('appraised_position')->after('appraised_by')->nullable();
            $table->string('recommended_position')->after('recommended_by')->nullable();
            $table->string('approved_position')->after('approve_by')->nullable();
            $table->string('owner_tin')->after('owner_address')->nullable();
            $table->string('owner_telephone')->after('owner_tin')->nullable();
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
            $table->dropColumn('barangay_lgu');
            $table->dropColumn('city_municipality');
            $table->dropColumn('appraised_position');
            $table->dropColumn('recommended_position');
            $table->dropColumn('approved_position');
            $table->dropColumn('owner_tin');
            $table->dropColumn('owner_telephone');
            //
        });
    }
}
