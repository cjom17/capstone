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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Fullname
            $table->string('position'); // Position
            $table->enum('gender', ['male', 'female', 'others']); // Gender
            $table->date('date_of_birth'); // Date of Birth
            $table->string('address'); // Address
            $table->string('phone_number'); // Phone Number
            $table->string('civil_status');
            $table->string('role')->default('admin'); // Role
            $table->string('profile_picture')->nullable(); // Profile Picture (you can make this field nullable if you want to allow users to have no profile picture)
            $table->string('username')->unique(); // Username
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
