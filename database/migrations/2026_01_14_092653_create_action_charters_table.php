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
        Schema::create('action_charters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gouvernorat_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('programme_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('profile_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('name_responsable_programme')->nullable();
            $table->string('name_programmer')->nullable();
            $table->string('priorite_1')->nullable();
            $table->string('priorite_2')->nullable();
            $table->string('priorite_3')->nullable();
            $table->string('priorite_4')->nullable();
            $table->text('strategie_programme')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('action_charters');
    }
};
