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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->id();
            $table->foreignId('teacher_id')->constrained('teachers'); // Assuming you have a 'teachers' table
            $table->string('section_name');
            $table->string('student_lrn')->unique();
            $table->integer('year_lvl');
            $table->string('profile_picture')->nullable();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('m_name')->nullable();
            $table->string('x_name')->nullable();
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('civil_status');
            $table->integer('age');
            $table->string('religion');
            $table->string('nationality');
            $table->text('address');
            $table->string('phone_number');
            $table->string('mother_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
