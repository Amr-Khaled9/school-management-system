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
        Schema::create('attendences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('grade_id')->references('id')->on('grades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('classroom_id')->references('id')->on('classrooms')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('section_id')->references('id')->on('sections')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('teacher_id')->references('id')->on('teachers')->onUpdate('cascade')->onDelete('cascade');
            $table->date('attendence_date');
            $table->boolean('attendence_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendences');
    }
};
