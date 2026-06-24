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
        Schema::create('etablissement_rhs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('name_etablissement_id')->nullable()->constrained('names_etablissements')->cascadeOnDelete();
            $table->foreignId('action_charter_id')->nullable()->constrained('action_charters')->cascadeOnDelete();
            $table->foreignId('profile_id')->nullable()->constrained()->cascadeOnDelete();
            $table->boolean('is_public')->default(1);
            $table->string('grade')->nullable();
            $table->string('specialisation')->nullable();
            $table->integer('number_male')->nullable();
            $table->integer('number_female')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissement_rhs');
    }
};

