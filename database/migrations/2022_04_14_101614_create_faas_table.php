<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faas', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('transaction');
            $table->string('revision_year');
            $table->string('td_number');
            $table->string('title_type');
            $table->string('title_number')->nullable();
            $table->date('title_date')->nullable();
            $table->date('issue_date');
            $table->string('effectivity');
            $table->string('quarter');
            $table->string('restriction')->nullable();
            $table->string('previous_td_number')->nullable();
            $table->string('previous_pin')->nullable();
            $table->string('owner_id');
            $table->string('owner_name');
            $table->string('owner_address');
            $table->string('declared_owner');
            $table->string('declared_address');
            $table->string('pin');
            $table->string('beneficial_user')->nullable();
            $table->string('beneficial_tin')->nullable();
            $table->string('beneficial_address')->nullable();
            $table->string('location_house_number')->nullable();
            $table->string('location_street')->nullable();
            $table->string('cadastral');
            $table->string('block_number')->nullable();
            $table->string('survey_number')->nullable();
            $table->string('purok_zone')->nullable();
            $table->string('north');
            $table->string('east');
            $table->string('south');
            $table->string('west');
            $table->string('classification_id');
            $table->string('classification_name');
            $table->string('specific_class');
            $table->string('sub_class');
            $table->string('unit_value');
            $table->string('area');
            $table->string('area_type');
            $table->string('market_value');
            $table->string('actual_use')->nullable();
            $table->string('assessment_level');
            $table->string('assessed_value');
            $table->string('taxable');
            $table->string('previous_mv')->nullable();
            $table->string('previous_av')->nullable();
            $table->string('appraised_by');
            $table->date('appraised_date');
            $table->string('recommended_by')->nullable();
            $table->date('recommended_date')->nullable();
            $table->string('approve_by');
            $table->date('approve_date');
            $table->string('remarks');
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
        Schema::dropIfExists('faas');
    }
}
