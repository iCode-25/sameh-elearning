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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade')->nullable(); // ربط بالإجابة بالمستخدم
            $table->foreignId('quiz_id')->constrained('quizzes')->onDelete('cascade'); // ربط بالسؤال
            $table->string('user_answer'); // تخزين إجابة المستخدم
            $table->boolean('is_correct')->default(false); // هل الإجابة صحيحة؟
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
