<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DefaultValuesToAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('neighborhood')->nullable(true)->default(null)->change();
            $table->string('street')->nullable(true)->default(null)->change();
            $table->integer('nationality_id')->nullable(true)->default(null)->change();
            $table->integer('idiom_id')->nullable(true)->default(null)->change();
            $table->integer('address_type_id')->nullable(true)->default(null)->change();
            $table->integer('publisher_id')->nullable(true)->default(null)->change();
            $table->integer('second_language_id')->nullable(true)->default(null)->change();
            $table->integer('card_id')->nullable(true)->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            //
        });
    }
}
