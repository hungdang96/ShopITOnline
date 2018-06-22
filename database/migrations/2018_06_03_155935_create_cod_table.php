<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('cod')) {
            Schema::create('cod', function (Blueprint $table) {
                $table->increments('Id');
                $table->unsignedInteger('TongTien');
                $table->unsignedInteger('TienCOD');
                $table->string('MSDVVC', 80);
                $table->string('TenDVVC', 150);;
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
        Schema::dropIfExists('cod');
    }
}
