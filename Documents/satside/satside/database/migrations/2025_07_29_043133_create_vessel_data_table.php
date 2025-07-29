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
        Schema::create('vessel_data', function (Blueprint $table) {
            $table->id();
            $table->string('vessel_id')->index();
            $table->timestamp('timestamp')->index();
            $table->double('latitude', 10, 7);
            $table->double('longitude', 10, 7);
            $table->double('speed')->nullable();
            $table->double('heading')->nullable();
            $table->string('destination')->nullable();
            $table->double('sanctions_risk_score')->nullable();
            $table->double('anomaly_score')->nullable();
            $table->string('last_port')->nullable();
            $table->string('flag_country')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vessel_data');
    }
};