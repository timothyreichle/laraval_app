<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note', function (Blueprint $table) {
		$table->increments('noteid');
		$table->integer('id');
		$table->integer('sortorder');
		$table->integer('x');
		$table->integer('y');
		$table->integer('width');
		$table->integer('height');
		$table->longText('text');
		$table->timestamps();
		$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('note');
    }
}
