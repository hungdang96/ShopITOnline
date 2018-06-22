<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNganquyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('nganquy')) {
            Schema::create('nganquy', function (Blueprint $table) {
                $table->string('MaNganQuy', 50);
                $table->string('TenNganQuy', 150);
                $table->string('SoTK', 30)->nullable();
                $table->string('TenTK', 150)->nullable();
                $table->unsignedTinyInteger('TrangThai')->default(1);

                $table->primary('MaNganQuy');
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
        Schema::dropIfExists('nganquy');
    }
}
