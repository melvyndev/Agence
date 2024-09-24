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
        Schema::create('subventions', function (Blueprint $table) {
            $table->id();
            $table->string('nom_complet');
            $table->string('email');
            $table->string('type_agriculture'); // Champs pour le type d'agriculture
            $table->text('description_projet');
            $table->decimal('montant_demande', 8, 2);
            $table->string('telephone');
            $table->string('adresse');
            $table->string('type_organisation'); // Coopérative, Entreprise, etc.
            $table->string('surface_exploitation')->nullable(); // Spécifique pour céréalière
            $table->string('type_plantes')->nullable(); // Spécifique pour horticulture
            $table->integer('nombre_animaux')->nullable(); // Spécifique pour élevage
            $table->string('piece_identite')->nullable(); // Pour joindre un fichier
            $table->text('description_beneficiaire'); // Pour décrire le bénéficiaire ou organisation
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subventions');
    }
};
