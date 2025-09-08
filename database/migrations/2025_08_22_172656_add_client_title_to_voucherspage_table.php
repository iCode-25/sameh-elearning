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
        Schema::table('voucherspage', function (Blueprint $table) {
            
            $table->string('client_title')->nullable();
            $table->string('coupon_title')->nullable();
            $table->string('package_title')->nullable();
            $table->string('lesson_title')->nullable();
            $table->string('level_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('voucherspage', function (Blueprint $table) {
            //
        });
    }
};
