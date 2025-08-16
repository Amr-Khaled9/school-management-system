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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');
            $table->decimal('amount',8,2);
            $table->foreignId('grade_id')->references('id')->on('Grades')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('classroom_id')->references('id')->on('Classrooms')->onDelete('cascade')->onUpdate('cascade');
            $table->string('description')->nullable();
            $table->string('year');
            $table->integer('fee_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
