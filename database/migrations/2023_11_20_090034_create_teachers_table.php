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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('profile_picture')->nullable(); // Profile Picture (you can make this field nullable if you want to allow users to have no profile picture)
            $table->string('image_id')->nullable();
            $table->integer('admin_id')->nullable(); 
            $table->string('fullname'); // Fullname
            $table->string('position')->default('Teacher'); // Position
            $table->integer('id_number'); 
            $table->string('advisory_lvl');  
            $table->string('section_name');  
            $table->enum('gender', ['male', 'female', 'others']); // Gender
            $table->date('date_of_birth'); // Date of Birth
            $table->string('address'); // Address
            $table->string('phone_number'); // Phone Number
            $table->enum('civil_status', ['single', 'married', 'widowed', 'divorced']); // Civil Status
            $table->string('username')->unique(); // Username
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('teacher'); // Role
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
