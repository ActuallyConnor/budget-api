<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->binary('uuid');
            $table->string('f_name', 100)->nullable();
            $table->string('l_name', 100)->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->string('address', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('province_state', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('postal_zip', 100)->nullable();
            $table->char('locale', 5)->default('en_CA');
            $table->string('phone', 100)->nullable();
            $table->date('dob')->nullable();
            $table->string('sex', 1)->nullable();
            $table->json('settings');
            $table->string('profile_image', 150)->nullable();
            $table->boolean('active')->default(true);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
