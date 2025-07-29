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
        Schema::create('country_risks', function (Blueprint $table) {
            $table->id();
            $table->string('country_code', 2)->index();
            $table->date('assessment_date')->index();
            $table->double('political_risk')->nullable();
            $table->double('economic_risk')->nullable();
            $table->double('financial_risk')->nullable();
            $table->double('overall_score');
            $table->string('trend_direction')->nullable(); // e.g., 'improving', 'declining', 'stable'
            $table->timestamp('last_updated')->useCurrent();
            $table->timestamps();

            $table->unique(['country_code', 'assessment_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_risks');
    }
};