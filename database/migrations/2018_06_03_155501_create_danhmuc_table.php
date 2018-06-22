<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanhmucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('danhmuc')) {
            Schema::create('danhmuc', function (Blueprint $table) {
                $table->string('MSDanhMuc', 80);
                $table->string('TenDanhMuc', 150);
                $table->text('MoTa');
                $table->string('DanhMucCha', 80);
                $table->unsignedTinyInteger('TrangThai');;

                $table->primary('MSDanhMuc');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danhmuc');
    }
}
