<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('from_grade');
            $table->unsignedBigInteger('from_classroom');
            $table->unsignedBigInteger('from_section');
            $table->unsignedBigInteger('to_grade');
            $table->unsignedBigInteger('to_classroom');
            $table->unsignedBigInteger('to_section');
            $table->foreign('student_id')->on('students')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('from_grade')->on('grades')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('from_classroom')->on('classrooms')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('from_section')->on('sections')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('to_grade')->on('grades')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('to_classroom')->on('classrooms')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('to_section')->on('sections')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
