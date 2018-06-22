<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('donhang')) {
            Schema::create('donhang', function (Blueprint $table) {
                $table->string('SoCT', 80);
                $table->string('SoHD', 50);
                $table->date('NgayBC');
                $table->date('NgayHD');
                $table->unsignedInteger('GiamGia');
                $table->float('GiamCK');
                $table->unsignedInteger('TienGiamCK');
                $table->float('TongCongChuaThue');
                $table->unsignedInteger('ThueSuat');
                $table->float('TienThue');
                $table->unsignedInteger('TienShip');
                $table->unsignedInteger('TienCOD');
                $table->float('TongCongCoThue');
                $table->string('LoaiCP', 10);
                $table->string('MSKH', 80);
                $table->string('TenKH', 150);
                $table->unsignedInteger('ThangKT');
                $table->unsignedInteger('NamKT');
                $table->unsignedTinyInteger('TrangThaiThanhToan');
                $table->string('TrangThaiPhu', 20);
                $table->string('MSNVBH', 80);
                $table->string('UserID', 80);
                $table->float('DaThanhToan');
                $table->string('SoPhieuThu', 80);
                $table->string('NganQuy', 50);
                $table->string('LoaiHD', 10);
                $table->float('TrongLuongHD');
                $table->string('MaVanDon', 50);
                $table->string('MSDVVC', 80);
                $table->string('TenDVVC', 150);
                $table->unsignedTinyInteger('TrangThaiDH');
                $table->unsignedInteger('SoTienChoNo');

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
        Schema::dropIfExists('xuatkho_header_posted');
    }
}
