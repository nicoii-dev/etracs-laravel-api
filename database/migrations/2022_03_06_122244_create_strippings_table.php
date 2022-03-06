<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Classification;

class CreateStrippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strippings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Classification::class)->constrained()->onDelete('cascade');
            $table->string('stripping_level');
            $table->string('rate');
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
        Schema::dropIfExists('strippings');
    }
}
