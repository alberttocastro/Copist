<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCardsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->integer('macro_region_id')->default(0)->change();
            $table->string('name')->nullable(true)->change();
            $table->integer('number')->standard(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->integer('macro_region_id')->default(null)->change();
            $table->string('name')->nullable(false)->change();
            $table->integer('number')->standard(null)->change();
        });
    }
}
