<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Classification;
class CreateSubClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Classification::class)->constrained()->onDelete('cascade');
            $table->string('code');
            $table->string('name');
            $table->string('unit_value');
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
        Schema::dropIfExists('sub_classes');
    }
}
