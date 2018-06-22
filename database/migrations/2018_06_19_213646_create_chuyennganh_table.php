<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChuyennganhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('chuyennganh')) {
            Schema::create('chuyennganh', function (Blueprint $table) {
                $table->string('MSChuyenNganh', 10);
                $table->string('TenChuyenNganh')->unique();
                $table->dateTime('LastModify');

                $table->primary('MSChuyenNganh');
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
        Schema::dropIfExists('chuyennganh');
    }
}
