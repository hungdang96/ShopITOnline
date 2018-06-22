<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangguivanchuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('donhangguivanchuyen')) {
            Schema::create('donhangguivanchuyen', function (Blueprint $table) {
                $table->string('MaVanDon', 80);
                $table->string('SoCT', 80);
                $table->string('SoHD', 20);
                $table->date('NgayDoiSoat');
                $table->date('NgayBC');
                $table->float('TienHD');
                $table->unsignedInteger('TienShip');
                $table->unsignedInteger('TienCOD');
                $table->unsignedInteger('TongCong');
                $table->unsignedInteger('TongTienBDThuHo');
                $table->unsignedInteger('TienCuocBDThuHo');
                $table->unsignedInteger('TienCuocBDChuyenPhat');
                $table->unsignedInteger('TongCongTraBD');
                $table->unsignedInteger('SoTienChenhLech');
                $table->string('MSKH', 80);
                $table->string('TenKH', 150);
                $table->string('TenNguoiNhan', 150);
                $table->text('DiaChiKH');
                $table->text('GhiChu');
                $table->string('MaTinh', 10);
                $table->string('TenTinh', 100);
                $table->string('MaHuyen', 10);
                $table->string('TenHuyen', 10);
                $table->string('MaPhuong', 10);
                $table->string('TenPhuong', 100);
                $table->text('TenSP');
                $table->unsignedInteger('ThangKT');
                $table->unsignedInteger('NamKT');
                $table->unsignedTinyInteger('TrangThai');
                $table->unsignedInteger('DaThu');
                $table->string('UserID', 80);
                $table->float('TrongLuong');
                $table->float('TrongLuongThucTe');
                $table->unsignedInteger('TienShipThucTe');
                $table->string('Loai', 5);
                $table->string('LoaiCP', 10);
                $table->string('MSDVVC', 80);
                $table->string('TenDVVC', 100);
                $table->string('Buoi', 10);
                $table->string('BuuCucNhanChuyen', 50);
                $table->string('KeyAPI', 100);
                $table->string('MaTTVanChuyen', 10);
                $table->string('TenTTVanChuyen', 100);
                $table->unsignedTinyInteger('DaLayHang');
                $table->dateTime('LastModify');

                $table->primary('MaVanDon');
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
        Schema::dropIfExists('donhangguivanchuyen');
    }
}
