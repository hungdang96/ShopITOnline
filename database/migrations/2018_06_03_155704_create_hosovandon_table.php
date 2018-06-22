<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHosovandonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('hosovandon')) {
            Schema::create('hosovandon', function (Blueprint $table) {
                $table->string('MaVanDon', 30);
                $table->text('TenVanDon');
                $table->string('PhanLoai', 20);
                $table->unsignedTinyInteger('DaDung')->default(0);
                $table->string('KeyAPI', 100);;

                $table->primary('MaVanDon');
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
        Schema::dropIfExists('hosovandon');
    }
}
