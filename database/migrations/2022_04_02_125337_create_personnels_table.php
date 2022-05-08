<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id();
            $table->string('staff_number');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('txn_code')->nullable();
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('personnels')->insert(
            array(
                'staff_number' => '123',
                'firstname' => 'admin',
                'lastname' => 'admin',
                'birth_date' => '1990-01-01',
                'gender' => 'male',
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
        Schema::dropIfExists('personnels');
    }
}
