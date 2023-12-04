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
        Schema::create('updates', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id'); 
            $table->string('update_image')->nullable();
            $table->string('update_title');
            $table->string('update_place')->nullable();
            $table->string('update_people')->nullable();
            $table->text('update_desc');  
            $table->date('update_date'); 
            $table->date('date_uploaded'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('updates');
    }
};
