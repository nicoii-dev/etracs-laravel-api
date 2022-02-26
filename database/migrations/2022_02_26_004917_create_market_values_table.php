<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AssessmentLevel;

class CreateMarketValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('market_values', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AssessmentLevel::class)->constrained()->onDelete('cascade');
            $table->string('market_value_from')->nullable();
            $table->string('market_value_to')->nullable();
            $table->string('market_value_rate')->nullable();
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
        Schema::dropIfExists('market_values');
    }
}
