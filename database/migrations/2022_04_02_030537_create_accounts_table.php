<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Personnel;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('personnel_id');
            $table->string('email');
            $table->string('password');
            $table->string('allow_login');
            $table->string('role');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('accounts')->insert(
            array(
                'personnel_id' => '1',
                'email' => 'admin@domain.com',
                'password' => 'etracsadmin',
                'allow_login' => 'yes',
                'role' => 'ADMIN',
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
        Schema::dropIfExists('accounts');
    }
}
