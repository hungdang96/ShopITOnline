<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('khachhang')) {
            Schema::create('khachhang', function (Blueprint $table) {
                $table->string('MSKH', 80);
                $table->string('TenKH', 150);
                $table->string('UserID', 80);
                $table->string('CMND', 15);
                $table->string('SDT', 15);
                $table->string('GioiTinh', 5);
                $table->date('NgaySinh');
                $table->string('SoNha', 150);
                $table->text('DiaChiGiaoHang');
                $table->string('MaTinh', 50);
                $table->string('MaHuyen', 50);
                $table->string('MaPhuong', 50);
                $table->string('MaVung', 3);
                $table->text('GhiChu');
                $table->float('DiemTichLuy');
                $table->unsignedTinyInteger('TrangThai');;

                $table->primary('MSKH');
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
        Schema::dropIfExists('khachhang');
    }
}
