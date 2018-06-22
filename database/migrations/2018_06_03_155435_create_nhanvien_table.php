<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhanvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('nhanvien')) {
            Schema::create('nhanvien', function (Blueprint $table) {
                $table->string('MSNV', 80);
                $table->string('TenNV', 150);
                $table->string('UserID', 80);
                $table->string('GioiTinh', 5);
                $table->string('DienThoai', 15);
                $table->date('NgaySinh');
                $table->string('CMND', 15);
                $table->text('HoKhau');
                $table->text('NoiOHienTai');
                $table->string('MSChuyenNganh', 10);
                $table->string('TenChuyenNganh', 100);
                $table->string('MSTrinhDo', 10);
                $table->string('TenTrinhDo', 100);
                $table->string('MSPhongBan', 20);
                $table->string('TenPhongBan', 100);
                $table->unsignedInteger('LuongCB');
                $table->float('PhuCap');
                $table->date('NgayTuyenDung');
                $table->dateTime('LastModify');

                $table->primary('MSNV');
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
        Schema::dropIfExists('nhanvien');
    }
}
