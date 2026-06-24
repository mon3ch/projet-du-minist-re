<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function PHPSTORM_META\type;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('nom_projet')->nullable();
            
            $table->foreignId('gouvernorat_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('delegation_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('programme_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('etablissement_id')->nullable()->constrained()->cascadeOnDelete();//type etablissement
            $table->foreignId('financement_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('profile_id')->nullable()->constrained()->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->text('details_projet')->nullable();
            $table->string('situation_etablissement_fonctionnelle')->nullable();
            $table->string('tranche')->nullable();
            $table->string('date')->nullable();
            $table->string('situation_immobiliere')->nullable();
            $table->string('estimation_budgetaire')->nullable();
            $table->string('cout_marche')->nullable();
            $table->string('credit_recommande_engager')->nullable();
            $table->string('credit_recommande_Payeur')->nullable();
            $table->integer('pourcentage_avancement')->nullable();
            $table->string('phase_projet')->nullable();
            $table->text('Remarque')->nullable();
            $table->date('date_annance_offre')->nullable();
            $table->date('date_debut')->nullable();
            $table->string('duree')->nullable();
            $table->date('date_fin_travaux')->nullable();
            $table->date('date_acceptation_temporaire')->nullable();
            $table->date('date_acceptation_finale')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
