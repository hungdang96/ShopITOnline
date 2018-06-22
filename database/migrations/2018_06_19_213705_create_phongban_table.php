<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhongbanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('phongban')) {
            Schema::create('phongban', function (Blueprint $table) {
                $table->string('MSPhongBan',80);
                $table->string('TenPhongBan');
                $table->dateTime('LastModify');

                $table->primary('MSPhongBan');
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
        Schema::dropIfExists('phongban');
    }
}
