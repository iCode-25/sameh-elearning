<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_tests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')->constrained('users')->nullable()->onDelete('cascade');
            $table->foreignId('test_id')->constrained('tests')->nullable()->onDelete('cascade');

            // Total of questions
            $table->integer('total_questions');
            $table->decimal('total_score', 5, 2);     // مثلاً: 10.00
            $table->decimal('student_score', 5, 2);   // مثلاً: 7.50
            $table->boolean('result_status'); // "✅ ناجح" or "❌

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_tests');
    }
};
