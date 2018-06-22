<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhapkhoChitietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('nhapkho_chitiet')) {
            Schema::create('nhapkho_chitiet', function (Blueprint $table) {
                $table->increments('Id');
                $table->string('SoCT', 80);
                $table->string('SoHD', 80);
                $table->date('NgayBC');
                $table->date('NgayHD');
                $table->string('MSSP', 80);
                $table->string('TenSP', 150);
                $table->text('MoTa');
                $table->string('DVT', 15);
                $table->string('MSDanhMuc', 80);
                $table->string('TenDanhMuc', 100);
                $table->string('NuocSanXuat', 20);
                $table->unsignedInteger('SoLuong');
                $table->string('SoLo', 50);
                $table->string('MSNCC', 80);
                $table->string('LoaiHD', 10);
                $table->unsignedInteger('ThangKT');
                $table->unsignedInteger('NamKT');
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
        Schema::dropIfExists('nhapkho_line_posted');
    }
}
