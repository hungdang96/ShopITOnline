<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThuchiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('thuchi')) {
            Schema::create('thuchi', function (Blueprint $table) {
                $table->string('SoCT', 80);
                $table->string('SoHD', 80);
                $table->date('NgayBC');
                $table->date('NgayHD');
                $table->string('MSNguoiNop', 30);
                $table->string('TenNguoiNop', 150);
                $table->string('LoaiThue', 30);
                $table->unsignedInteger('ThueSuat');
                $table->float('SoTienTruocThue');
                $table->float('TienThue');
                $table->float('SoTienSauThue');
                $table->text('NoiDung');
                $table->string('MSNV', 80);
                $table->string('TenNV', 150);
                $table->string('LoaiThuChi', 20);
                $table->string('LoaiChungTu', 20);
                $table->string('NganQuy', 50);
                $table->string('MaKhoanMuc', 10);
                $table->string('LoaiPhi', 20);;

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
        Schema::dropIfExists('thuchi');
    }
}
