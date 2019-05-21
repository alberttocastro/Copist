<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUserTypeColumnName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function(Blueprint $table)
        {
            $table->renameColumn('user_type', 'is_admin');
        });
        Schema::table('users', function(Blueprint $table)
        {
            $table->boolean('is_admin')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function(Blueprint $table)
        {
            $table->integer('is_admin')->change();
        });
        Schema::table('users', function(Blueprint $table)
        {
            $table->renameColumn('is_admin', 'user_type');
        });
    }
}
