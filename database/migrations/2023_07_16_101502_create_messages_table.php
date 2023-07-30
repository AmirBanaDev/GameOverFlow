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
            Schema::create('messages', function (Blueprint $table) {
                $table->id();
                $table->foreignId('sender')->constrained(table:'users',indexName:'messages_sender')->onDelete('cascade');
                $table->foreignId('receiver')->constrained(table:'users',indexName:'messages_receiver')->onDelete('cascade');
                $table->text('message');
                $table->string('fee');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('messages');
        }
};
