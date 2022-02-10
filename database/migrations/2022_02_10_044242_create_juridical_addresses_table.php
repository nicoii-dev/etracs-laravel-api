<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Juridical;

class CreateJuridicalAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juridical_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Juridical::class)->constrained()->onDelete('cascade');
            $table->string('house_number');
            $table->string('street');
            $table->string('barangay');
            $table->string('city_municipality');
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
        Schema::dropIfExists('juridical_addresses');
    }
}
