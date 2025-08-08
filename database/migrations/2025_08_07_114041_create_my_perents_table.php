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
        Schema::create('my_perents', function (Blueprint $table) {
            $table->id();
            $table->string('Email')->unique();
            $table->string('Password');

            //Fatherinformation
            $table->string('name_father');
            $table->string('national_id_father');
            $table->string('passport_iD_father');
            $table->string('phone_father');
            $table->string('job_father');
            $table->bigInteger('nationality_father_id')->unsigned();
            $table->foreign('nationality_father_id')
                ->references('id')->on('nationalities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('blood_type_father_id')->unsigned();
            $table->foreign('blood_type_father_id')
                ->references('id')->on('type__bloods')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('religion_father_id')->unsigned();
            $table->foreign('religion_father_id')
                ->references('id')->on('religions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('address_father');

            //Mother information
            $table->string('name_mother');
            $table->string('national_id_mother');
            $table->string('passport_id_Mother');
            $table->string('phone_mother');
            $table->string('job_mother');
            $table->bigInteger('nationality_mother_id')->unsigned();
            $table->foreign('nationality_mother_id')
                ->references('id')->on('nationalities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('blood_type_mother_id')->unsigned();
            $table->foreign('blood_type_mother_id')
                ->references('id')->on('type__bloods')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->bigInteger('religion_mother_id')->unsigned();
            $table->foreign('religion_mother_id')
                ->references('id')->on('religions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('address_mother');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_perents');
    }
};
