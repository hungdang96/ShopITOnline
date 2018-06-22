<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDathangnccTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('dathangncc')) {
            Schema::create('dathangncc', function (Blueprint $table) {
                $table->string('SoCT', 80);
                $table->date('NgayBC');
                $table->string('MSNCC', 80);
                $table->string('TenNCC', 150);
                $table->unsignedTinyInteger('TrangThai')->default(1);

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
        Schema::dropIfExists('dathangncc');
    }
}
