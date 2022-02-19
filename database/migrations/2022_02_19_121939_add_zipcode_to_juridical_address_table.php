<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddZipcodeToJuridicalAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('juridical_addresses', function (Blueprint $table) {
            $table->string('zipcode')->after('city_municipality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('juridical_addresses', function (Blueprint $table) {
            $table->dropColumn('zipcode');
        });
    }
}
