<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulaVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formula_variables', function (Blueprint $table) {
            $table->id();
            $table->string('variable');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('formula_variables')->insert(
            array(
                    'variable' => 'SYS_BASE_MARKET_VALUE',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formula_variables');
    }
}
