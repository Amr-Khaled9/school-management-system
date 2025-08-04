<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateclassroomsTable extends Migration {

public function up()
{
    Schema::create('classrooms', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->unsignedBigInteger('grade_id');
        $table->timestamps();
    });
}

	public function down()
	{
		Schema::drop('classrooms');
	}
}