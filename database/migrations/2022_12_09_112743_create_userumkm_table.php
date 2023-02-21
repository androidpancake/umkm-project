<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userumkm', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('namaumkm');
            $table->string('deskripsi')->nullable();
            $table->string('alamat');
            $table->string('avatar')->nullable();
            $table->string('bidangusaha');
            $table->string('phone_number');
            $table->bigInteger('pendapatan')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default(false);
            $table->timestamp('approved_at')->nullable();
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
        Schema::dropIfExists('userumkm');
    }
};
