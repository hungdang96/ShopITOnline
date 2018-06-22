<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCapsoseriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('capsoseri')) {
            Schema::create('capsoseri', function (Blueprint $table) {
                $table->string('MSSeri', 80);
                $table->string('LoaiSeri', 20);
                $table->string('GiaTri', 50);;
                $table->primary('MSSeri');
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
        Schema::dropIfExists('capsoseri');
    }
}
