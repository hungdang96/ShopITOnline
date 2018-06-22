<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhishipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('phiship')) {
            Schema::create('phiship', function (Blueprint $table) {
                $table->increments('Id');
                $table->float('TrongLuongTu');
                $table->float('TrongLuongDen');
                $table->unsignedInteger('SoTienNoiThanh');
                $table->unsignedInteger('SoTienNgoaiThanh');
                $table->unsignedInteger('MaVung');;
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
        Schema::dropIfExists('phiship');
    }
}
