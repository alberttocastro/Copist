<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'addresses', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('neighborhood');
                $table->string('street');
                $table->integer('nationality_id');
                $table->integer('idiom_id');
                $table->string('name');
                $table->boolean('is_valid');
                $table->boolean('is_visitable');
                $table->integer('address_type_id');
                $table->text('comments');
                $table->text('references');
                $table->integer('publisher_id');
                $table->integer('macro_region_id');
                $table->integer('second_language_id');
                $table->integer('card_id');
                $table->bigInteger('frequence');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('addresses');
    }
}
