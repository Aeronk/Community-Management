<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('dname')->index();
            $table->string('expenditure');
            $table->string('transaction_id');
            $table->string('supplier_name');
             $table->string('date_added');
            $table->string('amount');
            $table->string('received_from'); 
            $table->string('status');
            $table->string('comment')->nullabe();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
