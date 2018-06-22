<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhacungcapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('nhacungcap')) {
            Schema::create('nhacungcap', function (Blueprint $table) {
                $table->string('MSNCC', 80);
                $table->string('TenNCC', 150);
                $table->text('DiaChi');
                $table->string('MaTinh', 10);
                $table->string('MaHuyen', 10);
                $table->string('MaPhuong', 10);
                $table->string('NguoiDaiDien', 150);
                $table->string('SDT', 15);
                $table->string('FAX', 20);
                $table->string('SoTKNganHang', 20);
                $table->string('TenNganHang', 150);
                $table->unsignedTinyInteger('TrangThai');;

                $table->primary('MSNCC');
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
        Schema::dropIfExists('nhacungcap');
    }
}
