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
        Schema::create('parent_models', function (Blueprint $table) {
            $table->id();
            $table->string('profile_picture')->nullable();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('m_name')->nullable();
            $table->string('x_name')->nullable();
            $table->string('gender');
            $table->string('civil_status');
            $table->string('nationality');
            $table->string('religion');
            $table->string('address');
            $table->string('phone_number');
            $table->integer('age');
            $table->string('student_lrn');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parent_models');
    }
};
