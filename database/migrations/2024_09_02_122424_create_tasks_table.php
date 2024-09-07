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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('project_type');
            $table->enum('status', ['New', 'In Progress', 'Completed', 'Submission']);
            $table->date('target_date');
            $table->enum('priority', ['Low', 'Normal', 'High', 'Urgent']);
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users table
            $table->text('notes')->nullable();
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
