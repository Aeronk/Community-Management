<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ministers', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('denomination_id')->unsigned();
             $table->string('branch');
             $table->string('number_members');
             $table->string('position');
             $table->string('title');
             $table->string('first_name');
             $table->string('last_name');
             $table->string('home_tel');
             $table->string('email');
             $table->string('marital_status');
             $table->string('gender');
             $table->text('address');
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
        Schema::dropIfExists('ministers');
    }
}
