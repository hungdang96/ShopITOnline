<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDathangnccChitietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dathangncc_chitiet')) {
            Schema::create('dathangncc_chitiet', function (Blueprint $table) {
                $table->increments('Id');
                $table->string('SoCT', 80);
                $table->string('SoHD', 50);
                $table->date('NgayBC');
                $table->date('NgayHD');
                $table->string('MSHH', 80);
                $table->string('TenHH', 150);
                $table->unsignedInteger('TonCuoi');
                $table->string('DatHangGoiY');
                $table->string('GhiChu');
                $table->string('MSNCC', 80);
                $table->dateTime('LastModify');
                $table->string('MSCN', 80);
                $table->string('TenCN', 150);
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
        Schema::dropIfExists('dathangncc_line_posted');
    }
}
