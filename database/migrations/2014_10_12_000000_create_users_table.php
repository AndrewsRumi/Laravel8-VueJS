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
            $table->string('unitAREA');
            $table->string('nama_perusahaan');
            $table->bigInteger('noKTP');
            $table->string('direktur');
            $table->string('direktur_wakil');
            $table->bigInteger('hp_direktur');
            $table->bigInteger('hp_direktur_wakil');
            $table->bigInteger('telepon_perusahaan');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('kota');
            $table->string('alamat');
            $table->bigInteger('siup_no');
            $table->date('siup_tanggal');
            $table->string('bidang_usaha');
            $table->bigInteger('level_id');
            $table->string('website');
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
