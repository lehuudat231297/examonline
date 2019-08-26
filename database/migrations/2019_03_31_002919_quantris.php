<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Quantris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tai_khoan')->unique();
            $table->string('mat_khau');
            $table->string('ho_ten');
            $table->date('ngay_sinh');
            $table->tinyInteger('gioi_tinh');
            $table->string('email');
            $table->integer('so_dien_thoai');
            $table->string('dia_chi');
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
        Schema::dropIfExists('quantris');
    }
}
