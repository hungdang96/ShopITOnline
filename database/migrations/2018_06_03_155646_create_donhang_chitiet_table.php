<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangChitietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('donhang_chitiet')) {
            Schema::create('donhang_chitiet', function (Blueprint $table) {
                $table->string('SoCT', 80);
                $table->string('SoHD', 80);
                $table->date('NgayBC');
                $table->date('NgayHD');
                $table->string('MSSP', 80);
                $table->string('TenSP', 150);
                $table->text('MoTa');
                $table->string('DVT', 15);
                $table->unsignedInteger('SoLuong');
                $table->string('MaSize', 10);
                $table->string('MaMau', 10);
                $table->string('MaChatLieu', 10);
                $table->string('SoLo', 50);
                $table->date('HanDung');
                $table->float('GiaXuatKhoCoThue');
                $table->float('GiaBanChuaThueChuaGiam');
                $table->float('GiaBanChuaThueDaGiam');
                $table->unsignedInteger('GiamGia');
                $table->float('GiamCK');
                $table->unsignedInteger('TienGiamCK');
                $table->float('GiaBanCoThue');
                $table->unsignedInteger('ThueSuat');
                $table->float('TienThue');
                $table->float('ThanhTienChuaThue');
                $table->float('TrongLuong');
                $table->float('ThanhTienCoThue');
                $table->string('MSKH', 80);
                $table->string('MSNCC', 80);
                $table->string('MSNVBH', 80);
                $table->string('LoaiHD', 10);
                $table->unsignedInteger('ThangKT');
                $table->unsignedInteger('NamKT');
                $table->dateTime('LastModify');

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
        Schema::dropIfExists('xuatkho_line_posted');
    }
}
