<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuridicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juridicals', function (Blueprint $table) {
            $table->id();
            $table->string('account_number');
            $table->string('juridical_name');
            $table->string('email')->nullable();
            $table->string('contact_number');
            $table->date('date_registered');
            $table->string('kind_of_organization');
            $table->string('tin');
            $table->string('nature_of_business');
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('juridicals');
    }
}
