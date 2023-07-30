<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('category_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->primary(['user_id','category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_user');
    }
};
