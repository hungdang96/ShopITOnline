<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhapkhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('nhapkho')) {
            Schema::create('nhapkho', function (Blueprint $table) {
                $table->string('SoCT', 80);
                $table->string('SoHD', 80);
                $table->date('NgayBC');
                $table->date('NgayHD');
                $table->unsignedInteger('GiamGia');
                $table->unsignedInteger('GiamCK');
                $table->unsignedInteger('TienGiamCK');
                $table->float('TongCongChuaThue');
                $table->unsignedInteger('ThueSuat');
                $table->float('TienThue');
                $table->unsignedInteger('TienShip');
                $table->float('TongCongCoThue');
                $table->string('LoaiXuat', 10);
                $table->string('MSKH', 80);
                $table->string('TenKH', 100);
                $table->unsignedInteger('ThangKT');
                $table->unsignedInteger('NamKT');
                $table->unsignedTinyInteger('TrangThai');
                $table->string('MSCN',80);
                $table->string('MSNVBH', 80);
                $table->string('UserID', 80);
                $table->string('LoaiHD', 10);;

                $table->primary('SoCT');
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
        Schema::dropIfExists('nhapkho_header_posted');
    }
}
