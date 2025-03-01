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
        Schema::create('professor_data', function (Blueprint $table) {
            $table->id();
            $table->string('position');
            $table->string('company');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('birth_date');
            $table->unsignedBigInteger('work_experience_years');
            $table->unsignedBigInteger('user_id');
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professor_data');
    }
};
