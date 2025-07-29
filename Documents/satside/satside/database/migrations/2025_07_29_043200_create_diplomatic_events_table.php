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
        Schema::create('diplomatic_events', function (Blueprint $table) {
            $table->id();
            $table->date('event_date')->index();
            $table->string('country_code', 2)->index();
            $table->string('event_type');
            $table->text('description');
            $table->string('source_url')->nullable();
            $table->double('sentiment_score')->nullable();
            $table->string('impact_prediction')->nullable();
            $table->double('confidence_level')->nullable();
            $table->string('category')->nullable(); // For event categorization
            $table->timestamps();

            // Add full-text search capabilities (for MySQL/PostgreSQL)
            // $table->fullText(['description']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diplomatic_events');
    }
};