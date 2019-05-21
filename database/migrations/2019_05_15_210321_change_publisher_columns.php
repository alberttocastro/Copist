<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePublisherColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('publishers', function(Blueprint $table)
        {
            $table->string('neighborhood')->nullable(true)->change();
            $table->string('email')->nullable(true)->change();
            $table->string('phone')->nullable(true)->change();
            $table->integer('group_id')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('publishers', function(Blueprint $table)
        {
            $table->string('neighborhood')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
            $table->integer('group_id')->default(null)->change();
        });
    }
}
