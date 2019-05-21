<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAddressesColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('comments')->nullable(true)->change();
            $table->string('name')->nullable(true)->change();
            $table->string('neighborhood')->nullable(true)->change();
            $table->string('references')->nullable(true)->change();
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
            $table->string('comments')->nullable(false)->change();
            $table->string('name')->nullable(false)->change();
            $table->string('neighborhood')->nullable(false)->change();
            $table->string('references')->nullable(false)->change();
        });
    }
}
