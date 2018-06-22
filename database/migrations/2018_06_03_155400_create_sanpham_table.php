<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('sanpham')) {
            Schema::create('sanpham', function (Blueprint $table) {
                $table->string('MSSP', 80);
                $table->string('MAC', 10);
                $table->string('TenHH', 150);
                $table->string('SoLo', 10);
                $table->text('MoTa');
                $table->text('PathHinhAnh');
                $table->string('DVT', 10);
                $table->string('MSNCC', 80);
                $table->string('MSDanhMuc', 80);
                $table->string('TenDanhMuc', 150);
                $table->float('GiaNhap');
                $table->float('GiaNhapVAT');
                $table->unsignedInteger('GiaBanLe');
                $table->unsignedInteger('GiaBanKM');
                $table->unsignedInteger('GiaBanSi');
                $table->float('TrongLuong');
                $table->unsignedInteger('ThoiGianBaoHanh');
                $table->string('NuocSanXuat', 20);
                $table->unsignedInteger('DiemTichLuy');
                $table->unsignedInteger('SoDiemDuocDoi');
                $table->float('PhanTramCK');
                $table->unsignedTinyInteger('TrangThai');
                $table->string('MSCTKM', 20);

                $table->primary('MSSP');
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
        Schema::dropIfExists('sanpham');
    }
}
