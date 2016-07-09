<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banco');
            $table->string('sucursal');
            $table->string('estado');
            $table->string('numero_cuenta');
            $table->integer('client_id')->unsigned();
            $table->timestamps();

            $table->foreign('client_id')
              ->references('id')->on('clients')
              ->onDelete('cascade');

            $table->unique(['numero_cuenta', 'sucursal']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bank_accounts');
    }
}
