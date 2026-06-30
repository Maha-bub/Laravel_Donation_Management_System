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
        Schema::create('campaign_lists', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('name', 100);
            $table->string('description', 250)->nullable();
            $table->string('category', 50);
            $table->string('goal_amount', 50)->nullable();
            $table->boolean('status')->nullable();
            $table->string('action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_lists');
    }
};
