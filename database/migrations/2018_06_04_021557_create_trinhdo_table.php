<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrinhdoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('trinhdo')) {
            Schema::create('trinhdo', function (Blueprint $table) {
                $table->string('MaTrinhDo', 10);
                $table->string('TenTrinhDo', 50)->unique();
                $table->timestamps();

                $table->primary('MaTrinhDo');
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
        Schema::dropIfExists('trinhdo');
    }
}
