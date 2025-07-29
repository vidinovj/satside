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
        Schema::create('ml_predictions', function (Blueprint $table) {
            $table->id();
            $table->string('model_type')->index();
            $table->json('input_data');
            $table->json('prediction');
            $table->double('confidence')->nullable();
            $table->double('execution_time')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            // Add indexes for performance
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ml_predictions');
    }
};