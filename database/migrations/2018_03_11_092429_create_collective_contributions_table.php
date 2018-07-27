<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectiveContributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collective_contributions', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('dname')->index();;
            $table->string('type');
            $table->string('transaction_id');
            $table->string('amount');
            $table->string('received_from');
            $table->string('date_recieved');
            $table->string('status');
            $table->enum('typeof', [1,2]);
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
        Schema::dropIfExists('collective_contributions');
    }
}
