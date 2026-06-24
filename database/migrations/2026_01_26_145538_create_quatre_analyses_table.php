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
        Schema::create('quatre_analyses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->nullable()->constrained()->cascadeOnDelete(); 
            $table->foreignId('action_charter_id')->nullable()->constrained('action_charters')->cascadeOnDelete();
            $table->text('points_forts')->nullable();
            $table->text('points_faibles')->nullable();
            $table->text('opportunites')->nullable();
            $table->text('defis')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quatre_analyses');
    }
};
