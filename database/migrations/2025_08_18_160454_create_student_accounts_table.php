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
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('grade_id')->references('id')->on('grades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('receipt_id')->references('id')->on('receipt__students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('classroom_id')->references('id')->on('classrooms')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('debit',8,2)->nullable();
            $table->decimal('credit',8,2)->nullable();
            $table->string('type');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_accounts');
    }
};
