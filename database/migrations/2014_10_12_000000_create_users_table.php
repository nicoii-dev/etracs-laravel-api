<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Personnel;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('personnel_id');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('allow_login');
            $table->string('role');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('users')->insert(
            array(
                'personnel_id' => '1',
                'email' => 'admin@domain.com',
                'password' => bcrypt('etracsadmin'),
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
        Schema::dropIfExists('users');
    }
}
