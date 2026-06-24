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
        Schema::table('projets', function (Blueprint $table) {
          if (Schema::hasTable('projets')) {
            Schema::table('projets', function (Blueprint $table) {
                if (!Schema::hasColumn('projets', 'name_etablissement_id')) {
                    $table->foreignId('name_etablissement_id')->nullable()->constrained('names_etablissements')->cascadeOnDelete();
                }
                if (!Schema::hasColumn('projets', 'nature_projet_id')) {
                    $table->foreignId('nature_projet_id')->nullable()->constrained('nature_projets')->cascadeOnDelete();
                }
                if (!Schema::hasColumn('projets', 'type_projet_id')) {
                    $table->foreignId('type_projet_id')->nullable()->constrained('type_projets')->cascadeOnDelete();
                }
            });
        }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projets', function (Blueprint $table) {
          
        if (Schema::hasTable('projets')) {
            Schema::table('projets', function (Blueprint $table) {
                if (Schema::hasColumn('projets', 'name_etablissement_id')) {
                    $table->dropForeign(['name_etablissement_id']);
                    $table->dropColumn('name_etablissement_id');
                }
                if (Schema::hasColumn('projets', 'nature_projet_id')) {
                    $table->dropForeign(['nature_projet_id']);
                    $table->dropColumn('nature_projet_id');
                }
                if (Schema::hasColumn('projets', 'type_projet_id')) {
                    $table->dropForeign(['type_projet_id']);
                    $table->dropColumn('type_projet_id');
                }
            });
        }
        });
    }
};
