<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTonkhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('tonkho')) {
            Schema::create('tonkho', function (Blueprint $table) {
                $table->string('MSHH',80);
                $table->string('MaMac', 20);
                $table->string('TenHH', 150);
                $table->string('MSNCC',80);
                $table->text('MoTa');
                $table->string('DVT', 20);
                $table->text('PathHinhAnh');
                $table->string('SoLo', 10);
                $table->dateTime('HanDung');
                $table->float('TriGiaTonKho');
                $table->unsignedInteger('TongNhap');
                $table->float('ThanhTienTongNhap');
                $table->unsignedInteger('TongXuat');
                $table->float('ThanhTienTongXuat');
                $table->unsignedInteger('TonCuoi');
                $table->float('ThanhTienTonCuoi');
                $table->string('MSDanhMuc',80);
                $table->string('TenDanhMuc', 150);
                $table->string('NuocSanXuat', 20);
                $table->date('ThangKT');
                $table->date('NamKT');
                $table->string('MSCN',80);
                $table->string('TenCN', 150);
                $table->dateTime('LastModify');

                $table->primary('MSHH');
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
        Schema::dropIfExists('tonkho');
    }
}
