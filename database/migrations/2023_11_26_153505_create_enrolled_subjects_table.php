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
        Schema::create('enrolled_subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('teacher_id'); 
            $table->integer('student_lrn'); 
            $table->integer('subject_id'); 
            $table->string('subject_name')->nullable();  
            $table->string('subject_desc')->nullable(); 
            $table->decimal('first_qtr', 3, 1)->nullable();  
            $table->decimal('second_qtr', 3, 1)->nullable();  
            $table->decimal('third_qtr', 3, 1)->nullable();  
            $table->decimal('fourth_qtr', 3, 1)->nullable();  
            $table->decimal('final', 3, 1)->nullable();  
            $table->string('remarks')->default('NA');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrolled_subjects');
    }
};
