<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetNullableColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->string('neighborhood')->nullable(true)->change();
            $table->string('street')->nullable(true)->change();
            $table->integer('nationality_id')->nullable(true)->change();
            $table->integer('idiom_id')->nullable(true)->change();
            $table->boolean('is_valid')->nullable(false)->default(true)->change();
            $table->boolean('is_visitable')->nullable(false)->default(true)->change();
            $table->integer('address_type_id')->nullable(true)->change();
            $table->integer('publisher_id')->nullable(true)->change();
            $table->integer('second_language_id')->nullable(true)->change();
            $table->integer('card_id')->nullable(false)->change();
            $table->integer('frequence')->nullable(false)->default(0)->change();
        });

        Schema::table('cards', function (Blueprint $table) {
            $table->integer('macro_region_id')->nullable(true)->default(null)->change();
        });

        Schema::table('publishers', function (Blueprint $table) {
            $table->integer('group_id')->nullable(true)->default(null)->change();
        });

        Schema::table('suggested_addresses', function (Blueprint $table) {
            $table->string('name')->nullable(true)->default(null)->change();
            $table->string('comments')->nullable(true)->default(null)->change();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('is_admin')->nullable(false)->default(false)->change();
            $table->string('publisher_id')->nullable(true)->default(null)->change();
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
            $table->string('neighborhood')->nullable(false)->change();
            $table->string('street')->nullable(false)->change();
            $table->integer('nationality_id')->nullable(false)->change();
            $table->integer('idiom_id')->nullable(false)->change();
            $table->boolean('is_valid')->nullable(true)->default(null)->change();
            $table->boolean('is_visitable')->nullable(true)->default(null)->change();
            $table->integer('address_type_id')->nullable(false)->change();
            $table->integer('publisher_id')->nullable(false)->change();
            $table->integer('second_language_id')->nullable(false)->change();
            $table->integer('card_id')->nullable(true)->change();
            $table->integer('frequence')->nullable(true)->default(0)->change();
        });

        Schema::table('cards', function (Blueprint $table) {
            $table->integer('macro_region_id')->nullable(false)->default(null)->change();
        });

        Schema::table('publishers', function (Blueprint $table) {
            $table->integer('group_id')->nullable(false)->default(null)->change();
        });

        Schema::table('suggested_addresses', function (Blueprint $table) {
            $table->string('name')->nullable(false)->default(null)->change();
            $table->string('comments')->nullable(false)->default(null)->change();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('is_admin')->nullable(false)->default(null)->change();
            $table->string('publisher_id')->nullable(false)->default(null)->change();
        });
    }
}
