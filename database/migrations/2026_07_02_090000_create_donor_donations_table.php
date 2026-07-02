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
        Schema::create('donor_donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donor_list_id')->constrained('donor_lists')->cascadeOnDelete();
            $table->decimal('amount', 12, 2);
            $table->date('donation_date');
            $table->string('note', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donor_donations');
    }
};
