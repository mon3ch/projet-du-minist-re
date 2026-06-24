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
        if (Schema::hasTable('names_etablissements')) {
            Schema::table('names_etablissements', function (Blueprint $table) {
                if (!Schema::hasColumn('names_etablissements', 'gouvernorat_id')) {
                    $table->unsignedBigInteger('gouvernorat_id')->nullable();
                    $table->foreign('gouvernorat_id')->references('id')->on('gouvernorats')->cascadeOnDelete();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('names_etablissements')) {
            Schema::table('names_etablissements', function (Blueprint $table) {
                if (Schema::hasColumn('names_etablissements', 'gouvernorat_id')) {
                    $table->dropForeign(['gouvernorat_id']);
                    $table->dropColumn('gouvernorat_id');
                }
            });
        }
    }
};
