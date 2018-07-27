<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualContributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_contributions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('denomination_id')->index();
            $table->string('type');
            $table->string('transaction_id');
            $table->integer('amount');
            $table->string('received_from');
            $table->string('date_recieved');
            $table->enum('status', [1,2]);
             $table->enum('typeof', [1,2]);
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('individual_contributions');
    }
}
