<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('denomination_id')->unsigned();
            $table->string('fafullname');
            $table->string('facontact_number');
            $table->string('faemail');
            $table->string('wfullname');
            $table->string('wcontact_number');
            $table->string('wemail');
            $table->string('yfullname');
            $table->string('ycontact_number');
            $table->string('yemail');
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
        Schema::dropIfExists('contacts');
    }
}
